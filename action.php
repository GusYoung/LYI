<?php
  require 'connection.php';

  if(isset($_POST['action'])){
    $sql = "SELECT * FROM products INNER JOIN subcategories ON subcategories.subcategory_id = products.subcategory_id INNER JOIN vendors ON products.vendor_id = vendors.vendor_id WHERE product !=''";

    if(isset($_POST['furniture'])){
      $furniture =  implode("','",$_POST['furniture']);
      $sql .= "AND subcategories.subcategory IN('".$furniture."')";
    }
    if(isset($_POST['upholstery'])){
      $upholstery = implode("','", $_POST['upholstery']);
      $sql .= "AND subcategories.subcategory IN('".$upholstery."')";
    }
    if(isset($_POST['rugs'])){
      $rugs = implode("','", $_POST['rugs']);
      $sql .= "AND subcategories.subcategory IN('".$rugs."')";
    }
    if(isset($_POST['decor'])){
      $decor = implode("','", $_POST['decor']);
      $sql .= "AND subcategories.subcategory IN('".$decor."')";
    }
    if(isset($_POST['bath'])){
      $bath = implode("','", $_POST['bath']);
      $sql .= "AND subcategories.subcategory IN('".$bath."')";
    }

    $result = $conn->query($sql);
    $output = '';

    if (!empty($result) && $result->num_rows > 0){
      while($row=$result->fetch_assoc()){
        $output .='<div class="col-md-3 md-2">
          <div class="card-deck" style="margin-bottom: 20px;">
            <div class="card border-secondary">
              <img src="http://lyinteriors.com/test/assets/images/'.$row['image_name'].'" width="150" height="150" class="card-img-top">
              <div class="card-body">
                <h5 style="margin-bottom: 0px;" class="card-title text-center">'.$row['product'].'</h5>
                <p style="margin-bottom: 0px;" class="text-center">'.$row['vendor'].'</p>
                <a href="http://lyinteriors.com/test/assets/files/'.$row['file_name'].'" target="_blank" class="btn btn-primary btn-block">Tear Sheet</a>
              </div>
            </div>
          </div>
        </div>';
      }
    }
    else{
      $output = '<div class="col-lg-12 text-center">
                  <h3>No Products Found</h3>
                </div>';
    }
    echo $output;
  }

 ?>
