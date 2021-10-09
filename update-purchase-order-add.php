<?php
include('connection.php');
$description=ucfirst($_POST['description']);
$cost=$_POST['cost'];
$price=$_POST['price'];
$confirmation_num=$_POST['confirmation_num'];
$tracking_num=$_POST['tracking_num'];
$color=ucfirst($_POST['color']);
$units=$_POST['units'];
$size=ucfirst($_POST['size']);
$delivery=$_POST['delivery'];
$order_date=strtotime($_POST['order_date']);
$order_date=date('Y-m-d',$order_date);
$delivery_date=strtotime($_POST['delivery_date']);
$delivery_date=date('Y-m-d',$delivery_date);
$vendor=$_POST['vendor'];
$product=$_POST['product'];
$subcategory=$_POST['subcategory'];
$project_name=$_POST['project_name'];
$order_id=$_POST['order_id'];

$subtotal= $units*$price;

$sql="UPDATE orders
      SET description='$description',
          cost='$cost',
          price='$price',
          confirmation_num='$confirmation_num',
          tracking_num='$tracking_num',
          color='$color',
          units='$units',
          size='$size',
          delivery='$delivery',
          order_date='$order_date',
          delivery_date='$delivery_date',
          vendor_id= (SELECT vendors.vendor_id FROM vendors WHERE vendors.vendor='$vendor'),
          product_id=(SELECT products.product_id FROM products WHERE products.product = '$product'),
          category_id=(SELECT subcategories.category_id FROM subcategories WHERE subcategories.subcategory = '$subcategory'),
          client_id=(SELECT clients.client_id FROM clients WHERE clients.project_name = '$project_name'),
          subtotal='$subtotal'
          WHERE order_id='$order_id'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record updated successfuly";
  header('location: project-page.php?project_name='.$project_name.'');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
