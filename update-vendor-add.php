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
$vendor_id=$_POST['vendor_id'];

$sql="UPDATE vendors
      SET vendor='$vendor',
          contact='$contact',
          phone='$phone',
          website='$website',
          account_number='$account_number',
          support_contact='$support_contact',
          support_email='$support_email',
          vendor_password='$vendor_password',
          support_phone='$support_phone',
          discount='$discount',
          notes='$notes'
          WHERE vendor_id='$vendor_id'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record updated successfuly";
  header('location: vendor-page.php?vendor='.$vendor.'');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
