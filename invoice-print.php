<?
require('pdo.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lindsay Young Interiors | New Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
    <link rel="stylesheet" href="\test\css\custom.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script type="text/javascript">
    function htmlentities(str) {
      return $('<div/>').text(str).html();
    }
    </script>
  </head>
  <body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section style="margin-bottom: 40px;" class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h4 class="float-left">Invoice</h1>
              <h4 class="float-right">Date: 2/10/2014</h4>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- logo -->
      <section style="margin: 10px;" class="content">
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
                <label style="font-weight: bold;">Shipping Address</label><br>
                Lindsay Young Interiors<br>
                000 Boston Ave, Suite 000<br>
                Boston, MA XXXXXX<br>
              </address>
            </div>
              <div class="col-sm-3 invoice-col">
                <address>
                  <br>
                  <label style="font-weight: bold;">Billing Address</label><br>
                    Kevin Young<br>
                    00 Boston Road<br>
                    Boston, MA XXXXXX<br>
                </address>
              </div>
            </div>

            <div class="row">
              <div style="text-align: left;"class="col-9">
                <p>Lindsay Young Interiors<br>
                  Phone: (111)111-111<br>
                  Web: lindsayyounginteriors.com<br>
                </p>
              </div>
              <div style="text-align: left;" class="col-sm-3 invoice-col">
                <label style="font-weight: bold;">Payment Due</label><br>
                2/22/2014<br>
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
                                      INNER JOIN clients on clients.client_id = orders.client_id");
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
        </div>
      </section>
          <!-- /.row -->
      <section class="content">
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
                    <th>Total:</th>
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
      </section>
    </div>

<!-- Java Script -->
    <script src="\test\js\jquery.min.js"></script>
    <script src="\test\js\popper.min.js"></script>
    <script src="\test\js\bootstrap.min.js"></script>
    <script src="\test\js\custom.js"></script>
    <script src="\test\js\jquery.mask.min.js"></script>

<!-- page script -->
    <script type="text/javascript">
    window.addEventListener("load", window.print());
    </script>
  </body>
</html>
