<?php
include 'header.php';
require_once('pdo.php');

$order_id= isset($_GET['order_id']) ? $_GET['order_id'] : '';

$query="SELECT * FROM orders WHERE order_id = '$order_id'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
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
            <h1>Update Purchase Order</h1>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Update</a></li>
              <li class="breadcrumb-item active">Purchase Order</li>
            </ol>
          </div>
        </div>
      <!-- row -->
      </div>
    <!-- banner -->

    <!-- form -->
      <form action="update-purchase-order-add.php" method="post">
        <div class="card-body">

        <!--row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Project</label>
                <select id="client" class="form-control" name="project_name" value="<?php echo $row['project_name'] ?>" style="width: 100%;">
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Vendor</label>
                <select id="vendor" class="form-control" name="vendor" value="<?php echo $row['vendor'] ?>"style="width: 100%;">
                </select>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- row -->

          <!-- row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Sub Category</label>
                <select id="subcategory" class="form-control" name="subcategory" value="<?php echo $row['subcategory'] ?>"style="width: 100%;">
                </select>
              </div>
            </div>
            <!-- col -->

            <!-- col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Product</label>
                <select id="product" class="form-control" name="product" value="<?php echo $row['product'] ?>"style="width: 100%;">
                </select>
              </div>
            </div>
            <!-- column -->
          </div>
          <!-- row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" value="<?php echo $row['description'] ?>"style="width: 100%;" placeholder="Enter description">
              </div>
            </div>
            <!--column -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Size</label>
                <input type="text" class="form-control" name="size" value="<?php echo $row['size'] ?>"style="width: 100%;" placeholder="Enter size">
              </div>
            </div>
            <!-- col -->
          </div>
          <!-- row -->

          <!-- row -->
          <div class="row">
            <!-- column -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Color</label>
                <input type="text" class="form-control" name="color" value="<?php echo $row['color'] ?>"style="width: 100%;" placeholder="Enter color">
              </div>

              <div class="form-group">
                <label>Units</label>
                <input type="number" step="1" name="units" value="<?php echo $row['units'] ?>"class="form-control" style="width: 100%;" placeholder="00">
              </div>

            <!-- Date mm/dd/yyyy -->
              <div class="form-group">
                <label>Order Date</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="order_date" value="<?php echo $row['order_date'] ?>"style="width: 100%;" placeholder="00/00/0000" data-mask="00/00/0000" data-mask-reverse="true">
                </div>
              </div>

              <div class="form-group">
                <label>LY Cost</label>
                <input type="number" min="0.01" step="0.01" value="<?php echo $row['cost'] ?>"placeholder="$00.00" class="form-control" name="cost" style="width: 100%;">
              </div>

              <div class="form-group">
                <label>Confirmation Number</label>
                <input type="text" class="form-control" name="confirmation_num" value="<?php echo $row['confirmation_num'] ?>"style="width: 100%;" placeholder="Enter confirmation">
              </div>
            </div>
            <!-- col -->

            <!-- col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Dimensions</label>
                <input type="text" class="form-control" name="dimensions" value="<?php echo $row['dimensions'] ?>"style="width: 100%;"  data-mask="00x00x00" placeholder="00x00x00">
              </div>

              <div class="form-group">
                <label>Delivery</label>
                <select class="form-control" name="delivery" value="<?php echo $row['delivery'] ?>"style="width: 100%;">
                  <option selected="selected">Client</option>
                  <option>Receiver</option>
                </select>
              </div>

              <div class="form-group">
                <label>Delivery Date</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="delivery_date" value="<?php echo $row['delivery_date'] ?>"style="width: 100%;" placeholder="00/00/0000" data-mask="00/00/0000" data-mask-reverse="true">
                </div>
              </div>

              <div class="form-group">
                <label>Customer Price</label>
                <input type="number" name="price" value="<?php echo $row['price'] ?>"min="0.01" step="0.01" placeholder="$00.00" class="form-control" style="width: 100%;">
              </div>

              <div class="form-group">
                <label>Tracking Number</label>
                <input type="text" class="form-control" name="tracking_num" value="<?php echo $row['tracking_num'] ?>"style="width: 100%;" placeholder="Enter tracking number">
              </div>
            </div>
            <!-- col -->
          </div>
          <!-- row -->

          <div class="row">
            <div class="col-md-12">
            <div class="form-row text-center">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Order</button>
             </div>
            </div>

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
    <!-- page scrpt -->
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
    <!-- product -->
    <script type="text/javascript">
    $.getJSON('product-loop-source.php', function(data_product) {
      for (var i = 0; i < data_product.length; i++) {
        (function(i) {
            $.getJSON('product-loop-source.php', function(data_product) {
                console.log(data_product);
                data_product = data_product[i];
                found = true;
                window.console && console.log('data: '+i+' '+data_product.product);
                $("#product").append("<br><option>"+htmlentities(data_product.product)+"</option><br>");
              });
            })(i)
          };
        });
    </script>
  <!-- vendor -->
    <script type="text/javascript">
  // vendor
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
    <!-- category -->
    <script type="text/javascript">
  // Loop through categories
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
