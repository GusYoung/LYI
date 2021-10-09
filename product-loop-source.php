<?php
header('Content-Type: application/json');
$connect = new PDO("mysql:host=localhost;dbname=lyinteri_backend", "lyinteri_gus", "yalehockey4");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
  $data_product = array();
  $query = "SELECT product FROM products";
  $statement = $connect->prepare($query);
  $statement->execute($data_product);
  $result = $statement->fetchAll();
    foreach($result as $row){
      $data_product[] = array(
        'product' => $row['product'],
      );
    }
  echo json_encode($data_product, JSON_PRETTY_PRINT);
}

?>
