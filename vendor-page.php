<?php
include 'header.php';
require_once('pdo.php');
// Connect to MySQL

$vendor= isset($_GET['vendor']) ? $_GET['vendor'] : '';

$query="SELECT * FROM vendors WHERE vendor = '$vendor'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
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
            <h1><?php echo $row["vendor"]?></p>
          </div>
          <div class="col-sm-6">
            <form action="update-vendor.php" method="get">
              <button name="vendor" value="<?php echo $row['vendor']?>" type="submit">Update</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Top div -->
    <section class="content" style="margin-bottom: 20px;">
      <div class="container-fluid">
        <h4 style="text-align: center;" class="card-title" style="margin-bottom: 20px">Vendor Information</h4>
          <div class="card">
        <!-- client info -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Account Number</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["account_number"]?></p>
                </div>

                <div class="form-group">
                  <label>Website</label>
                  <a class="form-control" style="width: 100%" href="<?php echo $row["website"]?>" target="_blank"><?php echo $row["website"]?></a>
                </div>

                <div class="form-group">
                  <label>Contact</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["contact"]?></p>
                </div>

                <div class="form-group">
                  <label>Support Contact</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["support_contact"]?></p>
                </div>
                  <!-- /.form group -->
              </div>
              <!-- /.column group -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["vendor_password"]?></p>
                </div>

                <div class="form-group">
                  <label>Discount</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["discount"] . "%"?></p>
                </div>

                <div class="form-group">
                  <label>Phone</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["phone"]?></p>
                </div>

                <div class="form-group">
                  <label>Support Information</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["support_email"] . ", " . $row['support_phone']?></p>
                </div>
                <!-- form -->
              </div>
            <!-- col -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Notes</label>
                <p type="textarea" class="form-control" style="width: 100%"><?php echo $row['notes']?></p>
              </div>
            </div>
          <!-- row -->
            </div>
        <!-- card body-->
          </div>
        <!-- card -->
      </div>
      <!-- container -->
    </section>

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
