<?php
include('connection.php');
$vendor=ucwords($_POST['vendor']);
$contact=ucwords($_POST['contact']);
$phone=$_POST['phone'];
$website=$_POST['website'];
$account_number=$_POST['account_number'];
$support_contact=ucwords($_POST['support_contact']);
$support_email=$_POST['support_email'];
$vendor_password=$_POST['vendor_password'];
$support_phone=$_POST['support_phone'];
$discount=$_POST['discount'];
$notes=$_POST['notes'];

$sql = "INSERT INTO vendors (vendor, contact, phone, website, account_number, support_contact, support_email, vendor_password, support_phone, discount, notes)
        VALUES ('$vendor','$contact','$phone', '$website', '$account_number', '$support_contact', '$support_email', '$vendor_password', '$support_phone', '$discount', '$notes')";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record added successfuly";
  header('location: vendor-page.php?vendor='.$vendor.'');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
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

</html>
