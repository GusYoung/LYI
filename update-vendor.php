<?php
include 'header.php';
require_once('pdo.php');

$vendor= isset($_GET['vendor']) ? $_GET['vendor'] : '';

$query="SELECT * FROM vendors WHERE vendor = '$vendor'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
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
  </head>
<!-- add terms -->

  <body>
  <!-- container -->
    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Update Vendor</h1>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Update</a></li>
              <li class="breadcrumb-item active">Vendor</li>
            </ol>
          </div>
        </div>
      <!-- row -->
      </div>
    <!-- banner -->

    <!-- form -->
      <form action="update-vendor-add.php" method="post">
        <div class="card-body">
        <!--row -->
          <div class="row">
          <!-- column -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Vendor Name</label>
                <input type= "text" name="vendor" value="<?php echo $row['vendor'] ?>" class="form-control" style="width: 100%;" placeholder="Enter vendor name">
              </div>

              <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="account_number" value="<?php echo $row['account_nmber'] ?>"class="form-control" style="width: 100%;" placeholder="Enter account number or code">
              </div>

              <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'] ?>"style="width: 100%;" placeholder="Enter contact name">
              </div>

              <div class="form-group">
                <label>Support Contact</label>
                <input type="text" name="support_contact" value="<?php echo $row['support_contact'] ?>"class="form-control" style="width: 100%;" placeholder="Enter support contact">
              </div>

              <div class="form-group">
                <label>Support Email</label>
                <input type="text" name="support_email" value="<?php echo $row['support_email'] ?>"class="form-control" style="width: 100%;" placeholder="Enter support contact">
              </div>

            </div>
          <!-- /.column group -->
          <!-- column -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Website</label>
                <input type= "url" name="website" value="<?php echo $row['website'] ?>"onblur="checkURL(this)" class="form-control" style="width: 100%;" placeholder="Enter website">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="text" name="vendor_password" value="<?php echo $row['vendor_password'] ?>"class="form-control" style="width: 100%;" placeholder="Enter password">
              </div>

              <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'] ?>"style="width: 100%;" placeholder="(000)-000-0000" data-mask="(000)-000-0000">
              </div>

              <div class="form-group">
                <label>Support Phone</label>
                <input type="text" name="support_phone" value="<?php echo $row['support_phone'] ?>"class="form-control" style="width: 100%;" placeholder="(000)-000-0000" data-mask="(000)-000-0000">
              </div>

              <div class="form-group">
                <label>Discount</label>
                <input type="number" name="discount" value="<?php echo $row['discount'] ?>"class="form-control" style="width: 100%;" placeholder="Enter discount percentage">
								<input type="hidden" name="vendor_id" value="<?php echo $row['vendor_id'] ?>">
              </div>

            </div>
          <!-- Column -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Notes</label>
                <textarea type="text" name="notes" value="<?php echo $row['notes'] ?>"class="form-control" style="width: 100%;" placeholder="Enter notes"></textarea>
              </div>
            </div>

          <!-- Button -->
            <div class="col-md-12">
              <div class="form-row text-center">
                <div class="col-12">
                  <button type="submit" name="update" class="btn btn-primary">Update Vendor</button>
                </div>
              </div>
            <!-- button -->
            </div>
          <!-- /.col -->
          </div>
        <!-- row -->
        </div>
      <!-- card -->
      </form>
    <!-- form -->
    </div>
  <!-- container -->
    <footer style="position: relative;" class="fixed-bottom">
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

    <!-- page script -->
    <!-- http validation -->
    <script>
    function checkURL (abc) {
      var string = abc.value;
      if (!~string.indexOf("http")) {
        string = "http://" + string;
      }
      abc.value = string;
      return abc
    }
    </script>

  </body>
<!-- body -->
</html>
