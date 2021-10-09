<?php
header('Content-Type: application/json');
$project_name= isset($_GET['project_name']) ? $_GET['project_name'] : '';
$query="SELECT * FROM clients WHERE project_name = '$project_name'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$client_id=$row['client_id'];
//get client id of young house project name

$connect = new PDO("mysql:host=localhost;dbname=lyinteri_backend", "lyinteri_gus", "yalehockey4");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
  $data = array();


  $query = "SELECT orders.product_id, category, vendor, product, description, size, color, units, price, subtotal
            FROM orders
            INNER JOIN vendors on vendors.vendor_id = orders.vendor_id
            INNER JOIN categories on categories.category_id = orders.category_id
            INNER JOIN products on products.product_id = orders.product_id
            INNER JOIN clients on clients.client_id = orders.client_id
            WHERE orders.client_id = '$client_id'";

  $statement = $connect->prepare($query);
  $statement->execute($data);
  $result = $statement->fetchAll();
    foreach($result as $row){
      $data[] = array(
        'product_id' => $row['product_id'],
        'category' => $row['category'],
        'vendor' => $row['vendor'],
        'product' => $row['product'],
        'description' => $row['description'],
        'size' => $row['size'],
        'color' => $row['color'],
        'units' => $row['units'],
        'price' => $row['price'],
        'subtotal' => $row['subtotal'],
      );
    }
  echo json_encode($data, JSON_PRETTY_PRINT);
}

?>
