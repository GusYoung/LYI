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

$sql="UPDATE products
      SET product='$product',
          dimensions='$dimensions',
          ly_cost='$ly_cost',
          msrp='$msrp',
          colors='$colors',
          product_num='$product_num',
          image_name='$image_name',
          finishings='$finishings',
          materials='$materials',
          com_yardage='$com_yardage',
          weight='$weight',
          fabric_grade='$fabric_grade',
          vendor_id= (SELECT vendors.vendor_id FROM vendors WHERE vendors.vendor='$vendor'),
          subcategory_id= (SELECT subcategories.subcategory_id FROM subcategories WHERE subcategories.subcategory_id = '$subcategory'),
          path='$image_path',
          ts_path='$image_path_pdf',
          file_name='$file_name'
          WHERE product='$product'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record updated successfuly";
  header('location: product-db.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
