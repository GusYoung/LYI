<?php
header('Content-Type: application/json');
$connect = new PDO("mysql:host=localhost;dbname=lyinteri_backend", "lyinteri_gus", "yalehockey4");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
  $client = array();
  $query = "SELECT project_name FROM clients";
  $statement = $connect->prepare($query);
  $statement->execute($client);
  $result = $statement->fetchAll();
    foreach($result as $row){
      $client[] = array(
        'project_name' => $row['project_name'],
      );
    }
  echo json_encode($client, JSON_PRETTY_PRINT);
}

?>
