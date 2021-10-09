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

$subtotal= $units*$price;


$sql = "INSERT INTO orders (description, cost, price, confirmation_num, tracking_num, color, units, size, delivery, order_date, delivery_date, vendor_id, category_id, product_id, client_id, subtotal)
        VALUES ('$description', '$cost', '$price', '$confirmation_num', '$tracking_num', '$color', '$units', '$size', '$delivery', '$order_date', '$delivery_date',
          (SELECT vendors.vendor_id FROM vendors WHERE vendors.vendor = '$vendor'),
          (SELECT subcategories.category_id FROM subcategories WHERE subcategories.subcategory = '$subcategory'),
          (SELECT products.product_id FROM products WHERE products.product = '$product'),
          (SELECT clients.client_id FROM clients WHERE clients.project_name = '$project_name'),
          '$subtotal')";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record added successfuly";
  header('location: project-page.php?project_name='.$project_name.'');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lindsay Young Interiors | New Purchase Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
    <link rel="stylesheet" href="\test\css\custom.min.css">
  </head>

</html>
