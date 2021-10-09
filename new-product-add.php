<?php
include('connection.php');
$product=ucwords($_POST['product']);
$dimensions=$_POST['dimensions'];
$ly_cost=$_POST['ly_cost'];
$msrp=$_POST['msrp'];
$colors=ucwords($_POST['colors']);
$product_num=$_POST['product_num'];
$target_dir=$_SERVER['DOCUMENT_ROOT'].'/test/assets/images/';
$image_path=$target_dir . basename($_FILES['product_image']['name']);
$image_name=basename($_FILES['product_image']['name']);
$finishings=ucfirst($_POST['finishings']);
$materials=ucfirst($_POST['materials']);
$com_yardage=$_POST['com_yardage'];
$weight=$_POST['weight'];
$fabric_grade=$_POST['fabric_grade'];
$vendor=$_POST['vendor'];
$subcategory=$_POST['subcategory'];
$target_dir_pdf=$_SERVER['DOCUMENT_ROOT'].'/test/assets/files/';
$image_path_pdf=$target_dir_pdf . basename($_FILES['tear_sheet']['name']);
$file_name=basename($_FILES['tear_sheet']['name']);


if (!empty($_FILES['product_image']['tmp_name']) && getimagesize($_FILES['product_image']['tmp_name'])) {
  if (file_exists($image_path)) {
    $msg = 'Image already exists, please choose another or rename that image.';
  } else if ($_FILES['product_image']['size'] > 500000) {
    $msg = 'Image file size too large, please choose an image less than 500kb.';
  } else {
    // Everything checks out now we can move the uploaded image
    move_uploaded_file($_FILES['product_image']['tmp_name'], $image_path);
    move_uploaded_file($_FILES['tear_sheet']['tmp_name'], $image_path_pdf);
  }
}

    // Insert info into the database (title, description, image path, and date added)
$sql = "INSERT INTO products (product, dimensions, ly_cost, msrp, colors, product_num, vendor_id, path, finishings, materials, com_yardage, weight, fabric_grade, ts_path, image_name, subcategory_id, category_id, file_name)
          VALUES ('$product','$dimensions', '$ly_cost', '$msrp', '$colors', '$product_num',
          (SELECT vendors.vendor_id FROM vendors WHERE vendors.vendor = '$vendor'),
          '$image_path', '$finishings', '$materials', '$com_yardage', '$weight', '$fabric_grade', '$image_path_pdf', '$image_name',
          (SELECT subcategories.subcategory_id FROM subcategories WHERE subcategories.subcategory = '$subcategory'),
          (SELECT subcategories.category_id FROM subcategories WHERE subcategories.subcategory = '$subcategory'),
          '$file_name')";


if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record added successfuly";
  header('location: product-db.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lindsay Young Interiors | New Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
    <link rel="stylesheet" href="\test\css\custom.min.css">
  </head>

</html>
