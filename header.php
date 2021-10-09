<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'lyinteri_gus';
$DATABASE_PASS = 'yalehockey4';
$DATABASE_NAME = 'lyinteri_backend';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

?>
<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">LYI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="product-db.php">Products</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">New</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="new-product.php">Product</a>
            <a class="dropdown-item" href="new-vendor.php">Vendor</a>
            <a class="dropdown-item" href="new-client.php">Project</a>
            <a class="dropdown-item" href="new-purchase-order.php">Purchase Order</a>
            <a class="dropdown-item" href="new-expense.php">Expense</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Projects</a>
          <div class="dropdown-menu">
          <?php
              $sql="SELECT * FROM clients WHERE project_name != 'Internal'";
              $result=$conn->query($sql);
              while($row=$result->fetch_assoc())
              {
          ?>
            <a class="dropdown-item" href="/test/project-page.php?project_name=<?= $row['project_name']; ?>"><?= $row['project_name']; ?></a>
          <?php } ?>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Vendors</a>
          <div class="dropdown-menu">
            <?php
              $sql="SELECT * FROM vendors";
              $result=$conn->query($sql);
              while($row=$result->fetch_assoc())
              {
            ?>
            <a class="dropdown-item" href="/test/vendor-page.php?vendor=<?= $row['vendor']; ?>"><?= $row['vendor']; ?></a>
          <?php } ?>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
