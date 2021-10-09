<?php
include 'header.php';
// Connect to MySQL
require_once('pdo.php');

$expense_id= isset($_GET['expense_id']) ? $_GET['expense_id'] : '';

$query="SELECT * FROM expenses WHERE expense_id = '$expense_id'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lindsay Young Interiors | New Expense </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
    <link rel="stylesheet" href="\test\css\custom.min.css">
    <script type="text/javascript">
    function htmlentities(str) {
      return $('<div/>').text(str).html();
    }
    </script>
  </head>

  <body>
  <!-- container -->
    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Update Expense</h1>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Update</a></li>
              <li class="breadcrumb-item active">Expense</li>
            </ol>
          </div>
        </div>
      <!-- row -->
      </div>
    <!-- banner -->

    <!-- form -->
      <form action="update-expense-add.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
        <!--row -->
          <div class="row">
          <!-- column -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Date</label>
                <div class="input-group">
                  <input type="date" name="expense_date" value="<?php echo $row['expense_date'] ?>"class="form-control" style="width: 100%;" placeholder="00/00/0000">
                </div>
              </div>

              <div class="form-group">
                <label>Expense</label>
                <input type= "text" name="product" value="<?php echo $row['product'] ?>"class="form-control" style="width: 100%;" placeholder="Enter expense">
              </div>
            <!-- /.form-group -->

              <div class="form-group">
                <label>Amount ($)</label>
                <input type="number" name="ly_cost" min="0.01" step="0.01" value="<?php echo $row['ly_cost'] ?>" placeholder="$00.00"  class="form-control" style="width: 100%;">
              </div>

            </div>
          <!-- column -->
            <!--column-->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Client</label>
                <select id="client" class="form-control" name="client" value="<?php echo $row['project_name'] ?>"style="width: 100%;">
                </select>
              </div>

              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="bucket" value="<?php echo $row['bucket'] ?>"style="width: 100%;">
                  <option selected="selected">Marketing</option>
                  <option>G & A</option>
                  <option>Product</option>
                  <option>Travel</option>
                  <option>Learning & Development</option>
                </select>
              </div>

              <div class="form-group">
                <label>Upload Receipt</label>
                <input type="file" name="receipt_image" value="<?php echo $row['receipt_image'] ?>"accept="image/*" class="form-control" style="width: 100%;">
              </div>
            </div>
          <!-- Column -->
          </div>
          <!--row -->
          <!-- Button -->
          <div class="col-md-12">
            <div class="form-row text-center">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Expense</button>
              </div>
            </div>
              <!-- button -->
          </div>
          <!-- /.col -->
        </div>
        <!-- row -->
      </form>
    </div>

    <!-- form -->
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
    <!-- client loop -->
    <script type="text/javascript">
  // Loop through clients
    $.getJSON('client-loop-source.php', function(client) {
      for (var i = 0; i < client.length; i++) {
        (function(i) {
            $.getJSON('client-loop-source.php', function(client) {
                console.log(client);
                client = client[i];
                found = true;
                window.console && console.log('data: '+i+' '+client.project_name);
                $("#client").append("<br><option>"+htmlentities(client.project_name)+"</option><br>");
              });
            })(i)
          };
        });
    </script>
  </body>
<!-- body -->
</html>
