<?php
include('connection.php');
$project_name=ucwords($_POST['project_name']);
$first_name=ucfirst($_POST['first_name']);
$last_name=ucfirst($_POST['last_name']);
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$address=ucfirst($_POST['address']);
$city=ucwords($_POST['city']);
$state=ucwords($_POST['state']);
$estimated_budget=$_POST['estimated_budget'];
$start_date=strtotime($_POST['start_date']);
$start_date=date('Y-m-d',$start_date);
$end_date=strtotime($_POST['end_date']);
$end_date=date('Y-m-d',$end_date);
$zip=$_POST['zip'];

$sql = "INSERT INTO clients (project_name, first_name, last_name, email, phone_number, address, city, state, estimated_budget, start_date, end_date, zip)
        VALUES ('$project_name','$first_name', '$last_name', '$email', '$phone_number', '$address', '$city', '$state', '$estimated_budget', '$start_date','$end_date', '$zip')";

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
    <title>Lindsay Young Interiors | New Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
    <link rel="stylesheet" href="\test\css\custom.min.css">
  </head>

</html>
