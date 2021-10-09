<?php
include 'header.php';
require_once('pdo.php');

$project_name= isset($_GET['project_name']) ? $_GET['project_name'] : '';

$query="SELECT * FROM clients WHERE project_name = '$project_name'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
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
    <script type="text/javascript">
    function htmlentities(str) {
      return $('<div/>').text(str).html();
    }
    </script>
  </head>

  <body>
  <!-- container -->
    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Update Client</h1>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Update</a></li>
              <li class="breadcrumb-item active">Clients</li>
            </ol>
          </div>
        </div>
      <!-- row -->
      </div>
    <!-- banner -->

    <!-- form -->
      <form action="update-client-add.php" method="post">
        <div class="card-body">
        <!--row -->
          <div class="row">
          <!-- column -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Project Name</label>
                <input type= "text" name="project_name" value="<?php echo $row['project_name'] ?>" class="form-control" style="width: 100%;" placeholder="Enter project name">
              </div>
            <!-- /.form-group -->
              <div class="form-group">
                <label>First</label>
                <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>"class="form-control" style="width: 100%;" placeholder="Enter first name">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>"style="width: 100%;" placeholder="Enter email">
              </div>

              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ?>"style="width: 100%;" placeholder="Enter address">
              </div>

              <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $row['city'] ?>" style="width: 100%;" placeholder="Enter city">
              </div>
        <!-- Date mm/dd/yyyy -->
              <div class="form-group">
                <label>Start Date</label>
                <div class="input-group">
                  <input type="date" name ="start_date" class="form-control" value="<?php echo $row['start_date'] ?>"style="width: 100%;" placeholder="00/00/0000">
                </div>
            <!-- /.input group -->
              </div>
            <!-- /.form group -->
            </div>
          <!-- /.column group -->

          <!-- column -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Estimated Budget</label>
                <input type= "number" name="estimated_budget" class="form-control" value="<?php echo $row['estimated_budget'] ?>"style="width: 100%;" placeholder="Enter estimated budget">
              </div>

              <div class="form-group">
                <label>Last</label>
                <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name'] ?>"style="width: 100%;" placeholder="Enter last name">
              </div>


              <div class="form-group">
                <label>Phone Number</label>
                <div class="input-group">
                  <input type="text" name="phone_number" class="form-control" value="<?php echo $row['phone_number'] ?>"style="width: 100%;" placeholder="(000)-000-0000" data-mask="(000)-000-0000">
                </div>
              </div>

              <div class="form-group">
                <label>State</label>
                <input type="text" name="state" class="form-control" value="<?php echo $row['state'] ?>"style="width: 100%;" placeholder="State">
              </div>

              <div class="form-group">
                <label>Zip</label>
                <input type="text" name="zip" class="form-control" value="<?php echo $row['zip'] ?>"style="width: 100%;" placeholder="Zip" data-mask="00000">
              </div>

              <div class="form-group">
                <label>End Date</label>
                <div class="input-group">
                  <input type="date" name="end_date" class="form-control" value="<?php echo $row['end_date'] ?>" style="width: 100%;" placeholder="00/00/0000">
                  <input type="hidden" name="client_id" value="<?php echo $row['client_id'] ?>">
                </div>
              </div>
            </div>
          <!-- Column -->

          <!-- Button -->
            <div class="col-md-12">
              <div class="form-row text-center">
                <div class="col-12">
                  <button type="submit" name="update" class="btn btn-primary">Update Client</button>
                </div>
              </div>
            </div>
          <!-- /.col -->
          </div>
        <!-- row -->
        </div>
      <!-- card -->
      </form>
    <!-- form -->
    </div>
  <!-- container -->
    <footer style="position: relative;" class="fixed-bottom">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.18.2020
      </div>
      <strong>Copyright 2020 <a>Lindsay Young Interiors</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Java Script -->
    <script src="\test\js\jquery.min.js"></script>
    <script src="\test\js\popper.min.js"></script>
    <script src="\test\js\bootstrap.min.js"></script>
    <script src="\test\js\custom.js"></script>
    <script src="\test\js\jquery.mask.min.js"></script>
    <!-- page script -->

    <!-- vendors -->
  </body>
<!-- body -->
</html>
