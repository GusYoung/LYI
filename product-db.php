<?php
include 'header.php'
// If the user is not logged in redirect to the login page...
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lindsay Young Interiors | Product Database</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- css -->
  <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
  <link rel="stylesheet" href="\test\css\custom.min.css">

    <!-- jsGrid -->
  <link rel="stylesheet" href="\test\plugins\jsgrid\jsgrid.min.css">
  <link rel="stylesheet" href="\test\plugins\jsgrid\jsgrid-theme.min.css">
  <link rel="stylesheet" href="\test\plugins\jquery-ui-1.12.1\jquery-ui.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
  <div class="container-fluid">
    <div class="row">
      <div style="margin-bottom: 100px;" class="col-lg-3">
        <h5>Filter</h3>
        <hr>
        <h6 class="text-info">Furniture</h6>
        <ul style="padding-bottom: 20px;" class="list-group">
          <?php
            $sql="SELECT DISTINCT subcategory FROM subcategories INNER JOIN categories ON subcategories.category_id = categories.category_id WHERE categories.category = 'Furniture'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc())
            {
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?= $row['subcategory']; ?>" id="furniture"><?= $row['subcategory'];?>
              </label>
            </div>
          </li>
        <?php } ?>
        </ul>

        <h6 class="text-info">Upholstery & Wall Coverings</h6>
        <ul style="padding-bottom: 20px;" class="list-group">
          <?php
            $sql="SELECT DISTINCT subcategory FROM subcategories INNER JOIN categories ON subcategories.category_id = categories.category_id WHERE categories.category = 'Upholstery & Wall Coverings'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc())
            {
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?= $row['subcategory']; ?>" id="upholstery"><?= $row['subcategory']; ?>
              </label>
            </div>
          </li>
        <?php } ?>
        </ul>

        <h6 class="text-info">Rugs</h6>
        <ul style="padding-bottom: 20px;" class="list-group">
          <?php
            $sql="SELECT DISTINCT subcategory FROM subcategories INNER JOIN categories ON subcategories.category_id = categories.category_id WHERE categories.category = 'Rugs'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc())
            {
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?= $row['subcategory']; ?>" id="rugs"><?= $row['subcategory']; ?>
              </label>
            </div>
          </li>
        <?php } ?>
        </ul>

        <h6 class="text-info">Decor</h6>
        <ul style="padding-bottom: 20px;" class="list-group">
          <?php
            $sql="SELECT DISTINCT subcategory FROM subcategories INNER JOIN categories ON subcategories.category_id = categories.category_id WHERE categories.category = 'Decor'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc())
            {
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?= $row['subcategory']; ?>" id="decor"><?= $row['subcategory']; ?>
              </label>
            </div>
          </li>
        <?php } ?>
        </ul>

        <h6 class="text-info">Bed & Bath</h6>
        <ul class="list-group">
          <?php
            $sql="SELECT DISTINCT subcategory FROM subcategories INNER JOIN categories ON subcategories.category_id = categories.category_id WHERE categories.category = 'Bed & Bath'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc())
            {
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?= $row['subcategory']; ?>" id="bath"><?= $row['subcategory']; ?>
              </label>
            </div>
          </li>
        <?php } ?>
        </ul>
      </div>
      <div class="col-lg-9">
        <h5 class="text-center" id="textChange">Products</h5>
        <hr>
        <div class="text-center">
          <img src="images/loader.gif" id="loader" width="200" style="display:none;">
        </div>
        <div class="row" id="result">
          <?php
            $sql="SELECT * FROM products INNER JOIN vendors ON products.vendor_id = vendors.vendor_id";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc())
            {
          ?>
          <div class="col-md-3 md-2">
            <div class="card-deck" style="margin-bottom: 20px;">
              <div class="card border-secondary">
                <img style="margin-bottom: 0px;" src="http://lyinteriors.com/test/assets/images/<?= $row['image_name']; ?>" width="150" height="150" class="card-img-top">
                <div style="text-align: center;" class="card-body">
                  <h5 style="margin-bottom: 0px;" class="card-title text-center"><?= $row['product']; ?></h5>
                  <p style="margin-bottom: 0px;" class="text-center"><?= $row['vendor']; ?></p>
                  <a href="http://lyinteriors.com/test/assets/files/<?= $row['file_name']; ?>" target="_blank" class="btn btn-primary btn-block">Tear Sheet</a>
                  <a href="update-product.php?product=<?= $row['product']; ?>" class="text-center btn btn-info">Update</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
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
    <!--js-ui -->
  <script src="\test\plugins\jquery-ui-1.12.1\jquery-ui.js"></script>

    <!-- page script -->
  <script type="text/javascript">

    $(document).ready(function(){

      $(".product_check").click(function(){

        var action = 'data';
        var furniture = get_filter_text('furniture');
        var upholstery = get_filter_text('upholstery');
        var rugs = get_filter_text('rugs');
        var decor = get_filter_text('decor');
        var bath = get_filter_text('bath');

        $.ajax({
          url:'action.php',
          method:'POST',
          data:{action:action,furniture:furniture,upholstery:upholstery,rugs:rugs,decor:decor,bath:bath},
          success:function(response){
            $("#result").html(response);
            $("#textChange").text("Products");
          }
        });

      });

      function get_filter_text(text_id){
        var filterData = [];
        $('#'+text_id+':checked').each(function(){
          filterData.push($(this).val());
        });
        return filterData;
      }


    });
  </script>

</body>
</html>
