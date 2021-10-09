<?php
header('Content-Type: application/json');
$connect = new PDO("mysql:host=localhost;dbname=lyinteri_backend", "lyinteri_gus", "yalehockey4");
  $data = array();
  $query = "SELECT project_name, first_name, last_name, email, phone_number, start_date, end_date, city, state, estimated_budget FROM clients";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $result = $statement->fetchAll();
    foreach($result as $row){
      $data[] = array(
        'project_name' => $row['project_name'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'email' => $row['email'],
        'phone_number' => $row['phone_number'],
        'start_date' => $row['start_date'],
        'end_date' => $row['end_date'],
        'estimated_budget' => $row['estimated_budget'],
        'city' => $row['city'],
        'state' => $row['state'],
      );
    }
  echo json_encode($data, JSON_PRETTY_PRINT);


?>
