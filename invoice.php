<?php
include 'header.php';
require_once('pdo.php');

$project_name= isset($_GET['project_name']) ? $_GET['project_name'] : '';

$query="SELECT * FROM clients WHERE project_name = '$project_name'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$date=date("Y/m/d");
$new_date= date("Y/m/d", strtotime("$date +1 week"));
$client_id=$row['client_id'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lindsay Young Interiors | New Vendor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
    <link rel="stylesheet" href="\test\css\custom.min.css">
    <script src="\test\plugins\jspdf.debug.js"></script>
    <script src="\test\plugins\jspdf.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  </head>
<!-- add terms -->

  <body>
    <!-- Content Wrapper. Contains page content -->
    <div id="screen" class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section style="margin-bottom: 40px;" class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h4 class="float-left">Invoice</h1>
              <h4 class="float-right">Date: <?php echo(date("Y/m/d"))?></h4>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- logo -->
      <section style="margin: 5px;" class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-5">
              <a href="#">
                <img src="https://www.lyinteriors.com/test/assets/Logos/Logo.jpg" width="300" height="150">
              </a>
            </div>

            <div class="col-sm-4 invoice-col">
              <address>
                <br>
                <label style="font-weight: bold;">Shipping Address</label>
                <br>
                <?php echo $row["first_name"]?> <?php echo $row["last_name"]?><br>
                <?php echo $row["address"]?><br>
                <?php echo $row["city"]?>, <?php echo $row["state"]?> <?php echo $row["zip"]?><br>
              </address>
            </div>
              <div class="col-sm-3 invoice-col">
                <address>
                  <br>
                  <label style="font-weight: bold;">Billing Address</label><br>
                  <?php echo $row["first_name"]?> <?php echo $row["last_name"]?><br>
                  <?php echo $row["address"]?><br>
                  <?php echo $row["city"]?>, <?php echo $row["state"]?> <?php echo $row["zip"]?><br>
                </address>
              </div>
            </div>

            <div class="row">
              <div style="text-align: left;"class="col-9">
                <p>(408)-568-4558<br>
                  www.lindsayyounginteriors.com<br>
                </p>
              </div>
              <div style="text-align: left;" class="col-sm-3 invoice-col">
                <label style="font-weight: bold;">Payment Due</label><br>
                <?php echo($new_date);?><br>
              </div>
            </div>
        </div>
      </section>

      <!-- info -->
      <section class="content">
        <div class="containter-fluid">
        <h4 style="margin-bottom: 20px;">Order Details</h4>
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Item #</th>
                    <th>Cat</th>
                    <th>Ven</th>
                    <th>Product</th>
                    <th>Desc</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $stmt = $pdo->query("SELECT orders.product_id, category, vendor, product, description, size, color, units, price, subtotal
                                      FROM orders
                                      INNER JOIN vendors on vendors.vendor_id = orders.vendor_id
                                      INNER JOIN categories on categories.category_id = orders.category_id
                                      INNER JOIN products on products.product_id = orders.product_id
                                      INNER JOIN clients on clients.client_id = orders.client_id
                                      WHERE orders.client_id = '$client_id'");
                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo("<tr><td>");
                      echo($row["product_id"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo($row["category"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo($row["vendor"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo($row["product"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo($row["description"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo($row["size"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo($row["color"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo($row["units"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo("$" . $row["price"]);
                      echo("</td><td");
                      echo("<tr><td>");
                      echo("$" . $row["subtotal"]);
                      echo("</td><tr>");
                    }
                   ?>
                </tbody>
              </table>
          </div>
          <!-- /.col -->
        </div>
          <!-- /.row -->

        <div class="row">
                  <!-- accepted payments column -->
          <div class="col-9">
            <p class="lead">Payment Methods:</p>
          </div>
                  <!-- /.col -->
          <div class="col-3">
            <label style="font-weight: bold;" class="lead">Balance Due:</label>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Subtotal:</th>
                    <?php
                    $totals = array();
                    $query = "SELECT subtotal FROM orders";
                    $statement = $pdo->prepare($query);
                    $statement->execute($totals);
                    $result = $statement->fetchAll();
                    $balance = 0;
                      foreach($result as $row) {
                        $totals[] = array(
                          floatval($row['subtotal'])
                          );
                          $balance += floatval($row['subtotal']);
                      }

                      echo("<td>");
                      echo("$" . floatval($balance));
                      echo("</td>");
                      ?>
                    </tr>
                    <tr>
                      <th>Tax (10%)</th>
                      <?php
                      $totals = array();
                      $query = "SELECT subtotal FROM orders";
                      $statement = $pdo->prepare($query);
                      $statement->execute($totals);
                      $result = $statement->fetchAll();
                      $balance = 0;
                        foreach($result as $row) {
                          $totals[] = array(
                            floatval($row['subtotal'])
                          );
                          $balance += floatval($row['subtotal']);
                        }

                        $after_tax = floatval($balance)*.1;
                        echo("<td>");
                        echo("$" . $after_tax);
                        echo("</td>");
                        ?>
                    </tr>
                    <tr>
                      <th>Shipping:</th>
                      <td>$0.00</td>
                    </tr>
                    <tr>
                      <th style="font-weight: bold;">Total:</th>
                      <?php
                      $totals = array();
                      $query = "SELECT subtotal FROM orders";
                      $statement = $pdo->prepare($query);
                      $statement->execute($totals);
                      $result = $statement->fetchAll();
                      $balance = 0;
                        foreach($result as $row) {
                          $totals[] = array(
                            floatval($row['subtotal'])
                          );
                          $balance += floatval($row['subtotal']);
                      }
                      echo("<td>");
                      echo("$" . ($balance + $after_tax));
                      echo("</td>");
                      ?>
                      </tr>
                    </table>
                  </div>
              </div>
            </div>
                <!-- /.row -->
                <!-- this row will not appear when printing -->
            <div style="margin-bottom: 60px; text-align: center;" class="row no-print">
              <div class="col-12">
                <a href="/test/invoice-print.php" target="_blank" class="btn btn-success">
                  <i class="fas fa-print"></i>Print PDF
                </a>
                <a href="/test/invoice2.php" type="button" class="btn btn-primary" style="margin-right: 5px; align: center;">
                  <i style="align: center"></i>Generate PDF
                </a>
              </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer style="position: relative;" class="fixed-bottomr">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.18.2020
      </div>
      <strong>Copyright 2020 <a>Lindsay Young Interiors</a>.</strong> All rights
      reserved.
    </footer>

<!-- Java Script -->
    <script src="\test\js\jquery.min.js"></script>
    <script src="\test\js\popper.min.js"></script>
    <script src="\test\js\bootstrap.min.js"></script>
    <script src="\test\js\custom.js"></script>
    <script src="\test\js\jquery.mask.min.js"></script>

    <script src="\test\plugins\html2canvas.min.js"></script>
    <script src="\test\plugins\html2canvas.js"></script>

    <!-- page script -->
    <script type="text/javascript">
    let options = {
        foreignObjectRendering: true,
    };
    function genPDF() {
      html2canvas(document.getElementById('screen'), options).then(function(canvas) {
          var img = canvas.toDataURL("image/png");
          var doc = new jspdf();
          doc.addImage(img, 'JPG',20,20);
          doc.save('test.pdf');
        });
      }
    </script>
  </body>
<!-- body -->
</html>
