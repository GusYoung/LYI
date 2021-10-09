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
$client_id=$_POST['client_id'];

$sql="UPDATE clients
      SET project_name='$project_name',
          first_name='$first_name',
          last_name='$last_name',
          email='$email',
          phone_number='$phone_number',
          address='$address',
          city='$city',
          state='$state',
          estimated_budget='$estimated_budget',
          start_date='$start_date',
          end_date='$end_date',
          zip='$zip'
          WHERE client_id='$client_id'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record updated successfuly";
  header('location: project-page.php?project_name='.$project_name.'');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
