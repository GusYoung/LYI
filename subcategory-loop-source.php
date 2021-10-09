<?php
header('Content-Type: application/json');
$connect = new PDO("mysql:host=localhost;dbname=lyinteri_backend", "lyinteri_gus", "yalehockey4");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
  $data_sub = array();
  $query = "SELECT subcategory FROM subcategories";
  $statement = $connect->prepare($query);
  $statement->execute($data_sub);
  $result = $statement->fetchAll();
    foreach($result as $row){
      $data_sub[] = array(
        'subcategory' => $row['subcategory'],
      );
    }
  echo json_encode($data_sub, JSON_PRETTY_PRINT);
}

?>
