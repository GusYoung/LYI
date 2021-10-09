<?php
include('connection.php');
$expense_date=strtotime($_POST['expense_date']);
$expense_date=date('Y-m-d',$expense_date);
$expense=ucwords($_POST['expense']);
$amount=$_POST['amount'];
$bucket=$_POST['bucket'];
$client=$_POST['client'];
$target_dir_pdf=$_SERVER['DOCUMENT_ROOT'].'/test/assets/expenses/';
$image_path_receipt=$target_dir . basename($_FILES['receipt_image']['name']);


if (!empty($_FILES['receipt_image']['tmp_name']) && getimagesize($_FILES['receipt_image']['tmp_name'])) {
  if (file_exists($image_path)) {
    $msg = 'Image already exists, please choose another or rename that image.';
  } else if ($_FILES['receipt_image']['size'] > 500000) {
    $msg = 'Image file size too large, please choose an image less than 500kb.';
  } else {
    // Everything checks out now we can move the uploaded image
    move_uploaded_file($_FILES['receipt_image']['tmp_name'], $image_path);

  }
}

    // Insert image info into the database (title, description, image path, and date added)
$sql = "INSERT INTO expenses (date, expense, amount, bucket, client_id, receipt)
          VALUES ('$expense_date','$expense', '$amount', '$bucket',
          (SELECT clients.client_id FROM clients WHERE clients.project_name = '$client'),
          '$image_path_receipt')";


if ($conn->query($sql) === TRUE) {
  $_SESSION['message'] = "record updated successfuly";
  header('location: expenses.php?client='.$client.'');
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
