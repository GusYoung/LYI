<?php
header('Content-Type: application/json');
$connect = new PDO("mysql:host=localhost;dbname=lyinteri_backend", "lyinteri_gus", "yalehockey4");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
  $data_vendor = array();
  $query = "SELECT vendor FROM vendors";
  $statement = $connect->prepare($query);
  $statement->execute($data_vendor);
  $result = $statement->fetchAll();
    foreach($result as $row){
      $data_vendor[] = array(
        'vendor' => $row['vendor'],
      );
    }
  echo json_encode($data_vendor, JSON_PRETTY_PRINT);
}

?>
