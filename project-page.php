<?php
include 'header.php';
require_once('pdo.php');
// Connect to MySQL

$project_name= isset($_GET['project_name']) ? $_GET['project_name'] : '';

$query="SELECT * FROM clients WHERE project_name = '$project_name'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$client_id=$row['client_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lindsay Young Interiors | Projects</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- css -->
  <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
  <link rel="stylesheet" href="\test\css\custom.min.css">
    <!-- jsGrid -->
  <link rel="stylesheet" href="\test\plugins\jsgrid\jsgrid.css">
  <link rel="stylesheet" href="\test\plugins\jsgrid\jsgrid-theme.min.css">
  <script type="text/javascript" src="\test\js\jquery.min.js">
  </script>
  <script type="text/javascript">
  function htmlentities(str) {
    return $('<div/>').text(str).html();
  }
  </script>
</head>

<body>
  <?php if (isset($_SESSION['message'])): ?>
	<div style="margin: 30px auto; padding: 10px; border-radius: 5px; color: #3c763d; background: #dff0d8; border: 1px solid #3c763d;width: 50%;text-align: center;">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
  <?php endif ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: 30px; margin-top: 25px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $row["project_name"]?></p>
          </div>
          <div class="col-sm-6">
            <form action="update-client.php" method="get">
              <button name="project_name" value="<?php echo $row['project_name']?>" type="submit">Update</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Top div -->
    <section class="content" style="margin-bottom: 20px;">
      <div class="container-fluid">
        <h4 style="text-align: center;" class="card-title" style="margin-bottom: 20px">Client Information</h4>
          <div class="card">
        <!-- client info -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["first_name"]?></p>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["email"]?></p>
                </div>

                <div class="form-group">
                  <label>Budget</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo "$" . $row["estimated_budget"] . ".00"?></p>
                </div>

                <div class="form-group">
                  <label>Start Date</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["start_date"]?></p>
                </div>
                  <!-- /.form group -->
              </div>
              <!-- /.column group -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["last_name"]?></p>
                </div>

                <div class="form-group">
                  <label>Phone Number</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["phone_number"]?></p>
                </div>

                <div class="form-group">
                  <label>Location</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["city"] . ", " . $row['state']?></p>
                </div>

                <div class="form-group">
                  <label>End Date</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["end_date"]?></p>
                </div>
                <!-- form -->
              </div>
            <!-- col -->
            </div>
          <!-- row -->
            </div>
        <!-- card body-->
          </div>
        <!-- card -->
      </div>
    </section>

    <!-- Table -->
    <section style="text-align: center;" class="content">
      <div class="container-fluid">
        <h4 class="card-title" style="margin-bottom: 20px;">Project Specs</h4>
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
                  $stmt = $pdo->query("SELECT orders.order_id, orders.product_id, category, vendor, product, description, size, color, units, price, subtotal
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
                      echo("</td><td");
                      echo("<tr><td>");
                      echo("<form action='update-purchase-order.php' method='get'>");
                      echo("<button name='order_id' value='".$row["order_id"]."'type='submit'>Edit</button>");
                      echo("</form>");
                      echo("</td><tr>");

                    }
                   ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
            <div class="col-md-12">
              <div class="form-row">
                <div class="col-12" style="margin-bottom: 40px;">
                  <form class="form" method="get" action="invoice.php">
                  <button type="submit" id="pdf" name="project_name" value="<?php echo($project_name)?>" class="btn btn-primary text-center">Create Invoice</button>
                </div>
              </div>
          	</div>
          <!-- /.card -->
        	</div>
        <!-- row -->
			</div>
			<!-- container -->
    </section>
    <!-- table -->

  </div>
  <!-- /.content-wrapper -->
  <footer style="position: relative;" class="fixed-bottom">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.20.2020
    </div>
    <strong>Copyright &copy; 2020 <a href="#">Lindsay Young Interiors</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->


<!-- Jquery -->
  <script src="\test\js\jquery.min.js"></script>
  <script src="\test\js\popper.min.js"></script>
  <script src="\test\js\bootstrap.min.js"></script>
  <script src="\test\js\custom.js"></script>
  <script src="\test\js\jquery.mask.min.js"></script>
  <!-- jsGrid -->
  <script src="\test\plugins\jsgrid\jsgrid.min.js"></script>
  <script src="\test\plugins\jsgrid\jsgrid.js"></script>
  <!-- page script -->
</body>
</html>
