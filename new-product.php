<?php

include 'header.php';
// Connect to MySQL

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lindsay Young Interiors | New Product </title>
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
            <h1>New Product</h1>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">New</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      <!-- row -->
      </div>
    <!-- banner -->

    <!-- form -->
      <form action="new-product-add.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
        <!--row -->
          <div class="row">
          <!-- column -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Product</label>
                <input type= "text" name="product" class="form-control" style="width: 100%;" placeholder="Enter product name">
              </div>
            <!-- /.form-group -->
              <div class="form-group">
                <label>Vendor</label>
                <select id="vendor" class="form-control" name="vendor" style="width: 100%;">
                </select>
              </div>

              <div class="form-group">
                <label>Dimensions</label>
                <input type="text" name="dimensions" class="form-control" style="width: 100%;" data-mask="00x00x00" placeholder="00x00x00">
              </div>

              <div class="form-group">
                <label>Finishings</label>
                <input type="text" name="finishings" class="form-control" style="width: 100%;" placeholder="Enter finishings">
              </div>
            </div>
            <!--column -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Product Number:</label>
                <input type= "text" name="product_num" class="form-control" style="width: 100%;" placeholder="Enter product number">
              </div>

              <div class="form-group">
                <label>Sub Category</label>
                <select id="subcategory" name="subcategory" class="form-control" style="width: 100%;">
                </select>
              </div>

              <div class="form-group">
                <label>Available Colors</label>
                <input type= "text" name="colors" class="form-control" style="width: 100%;" placeholder="Enter colors">
              </div>

              <div class="form-group">
                <label>Materials</label>
                <input type= "text" name="materials" class="form-control" style="width: 100%;" placeholder="Enter materials">
              </div>
            </div>
          <!-- column -->
          </div>
          <!--row -->
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Weight</label>
                <input type="text" name="weight" class="form-control" style="width: 100%;" placeholder="Enter weight">
              </div>
            </div>
            <!--column -->
            <div class="col-lg-3">
              <div class="form-group d-inline">
                <label>Fabric Grade</label>
                <input type= "text" name="fabric_grade" class="form-control" style="width: 100%;" placeholder="Enter fabric grade">
              </div>
            </div>
            <!-- column -->
            <div class="col-lg-3">
              <div class="form-group d-inline">
                <label>COM Yardage</label>
                <input type= "float" name="com_yardage" placeholder="00.00" class="form-control" style="width: 100%;" placeholder="Enter yardage">
              </div>
            </div>
          </div>
          <!-- row -->
          <div class="row">
            <!--column-->
            <div class="col-lg-6">
              <div class="form-group">
                <label>LYI Cost</label>
                <input type="number" name="ly_cost"min="0.01" step="0.01" placeholder="$00.00"  class="form-control" style="width: 100%;">
              </div>

              <div class="form-group">
                <label>Tear Sheet</label>
                <input type="file" name="tear_sheet" accept="application/pdf" class="form-control" style="width: 100%;">
              </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>MSRP</label>
                <input type="number" name="msrp" min="0.01" step="0.01" placeholder="$00.00" class="form-control" style="width: 100%;">
              </div>

              <div class="form-group">
                <label>Upload Picture</label>
                <input type="file" name="product_image" accept="image/*" class="form-control" style="width: 100%;">
              </div>
            </div>
          <!-- Column -->
          </div>
          <!--row -->
          <!-- Button -->
            <div class="col-md-12">
              <div class="form-row text-center">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Add Product</button>
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
    <!-- vendor -->
    <script type="text/javascript">
  // Loop through clients / projects
    $.getJSON('vendor-loop-source.php', function(data_vendor) {
      for (var i = 0; i < data_vendor.length; i++) {
        (function(i) {
            $.getJSON('vendor-loop-source.php', function(data_vendor) {
                console.log(data_vendor);
                data_vendor = data_vendor[i];
                found = true;
                window.console && console.log('data: '+i+' '+data_vendor.vendor);
                $("#vendor").append("<br><option>"+htmlentities(data_vendor.vendor)+"</option><br>");
              });
            })(i)
          };
        });
    </script>
    <!--sub category -->
    <script type="text/javascript">
  // Loop through clients / projects
    $.getJSON('subcategory-loop-source.php', function(data_sub) {
      for (var i = 0; i < data_sub.length; i++) {
        (function(i) {
            $.getJSON('subcategory-loop-source.php', function(data_sub) {
                console.log(data_sub);
                data_sub = data_sub[i];
                found = true;
                window.console && console.log('data: '+i+' '+data_sub.subcategory);
                $("#subcategory").append("<br><option>"+htmlentities(data_sub.subcategory)+"</option><br>");
              });
            })(i)
          };
        });
    </script>

  </body>
<!-- body -->
</html>
