<?php
include 'header.php';
// Connect to MySQL

$project_name= isset($_GET['project_name']) ? $_GET['project_name'] : '';

$query="SELECT * FROM clients WHERE project_name = '$project_name'" or die;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lindsay Young Interiors | Projects</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- css -->
  <link rel="stylesheet" href="\test\css\bootstrap-lux.css" media="screen">
  <link rel="stylesheet" href="\test\css\custom.min.css">
    <!-- jsGrid -->
  <link rel="stylesheet" href="\test\plugins\jsgrid\jsgrid.css">
  <link rel="stylesheet" href="\test\plugins\jsgrid\jsgrid-theme.min.css">
  <script type="text/javascript" src="\test\js\jquery.min.js">
  </script>
  <script type="text/javascript">
  function htmlentities(str) {
    return $('<div/>').text(str).html();
  }
  </script>
</head>

<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: 30px; margin-top: 25px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $row["project_name"]?></p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Top div -->
    <section class="content" style="margin-bottom: 20px;">
      <div class="container-fluid">
        <h4 style="text-align: center;" class="card-title" style="margin-bottom: 20px">Client Information</h4>
          <div class="card">
        <!-- client info -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["first_name"]?></p>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["email"]?></p>
                </div>

                <div class="form-group">
                  <label>Budget</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo "$" . $row["estimated_budget"] . ".00"?></p>
                </div>

                <div class="form-group">
                  <label>Start Date</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["start_date"]?></p>
                </div>
                  <!-- /.form group -->
              </div>
              <!-- /.column group -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["last_name"]?></p>
                </div>

                <div class="form-group">
                  <label>Phone Number</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["phone_number"]?></p>
                </div>

                <div class="form-group">
                  <label>Location</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["city"] . ", " . $row['state']?></p>
                </div>

                <div class="form-group">
                  <label>End Date</label>
                  <p type= "text" class="form-control" style="width: 100%"><?php echo $row["end_date"]?></p>
                </div>
                <!-- form -->
              </div>
            <!-- col -->
            </div>
          <!-- row -->
            </div>
        <!-- card body-->
          </div>
        <!-- card -->
      </div>
    </section>

    <!-- Table -->
    <section style="text-align: center;" class="content">
      <div class="container-fluid">
        <h4 class="card-title" style="margin-bottom: 20px;">Project Specs</h4>
          <div class="card">
            <div class="card-body">
              <div style="height: 200; margin-bottom: 40px;" id="jsGrid1"></div>
            </div>
            <!-- /.card-body -->
            <div class="col-md-12">
              <div class="form-row">
                <div class="col-12" style="margin-bottom: 40px;">
                  <form class="form" method="get" action="invoice.php">
                  <button type="submit" id="pdf" name="project_name" value="<?php echo $row["project_name"]?>" class="btn btn-primary text-center">Create Invoice</button>
                </div>
              </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- container -->
    </section>
    <!-- table -->

  </div>
  <!-- /.content-wrapper -->
  <footer style="position: relative;" class="fixed-bottom">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.20.2020
    </div>
    <strong>Copyright &copy; 2020 <a href="#">Lindsay Young Interiors</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->


<!-- Jquery -->
  <script src="\test\js\jquery.min.js"></script>
  <script src="\test\js\popper.min.js"></script>
  <script src="\test\js\bootstrap.min.js"></script>
  <script src="\test\js\custom.js"></script>
  <script src="\test\js\jquery.mask.min.js"></script>
  <!-- jsGrid -->
  <script src="\test\plugins\jsgrid\jsgrid.min.js"></script>
  <script src="\test\plugins\jsgrid\jsgrid.js"></script>
  <!-- page script -->
  <script>
    $(document).ready(function() {
      $("#jsGrid1").jsGrid({
          height: "auto",
          width: "100%",
          sorting: true,
          paging: true,
          filtering: true,
          autoload: true,
          fields: [
              { title: 'Item #', name: "product_id"},
              { title: 'Ctgy.', name: "category"},
              { title: 'Vendor', name: "vendor"},
              { title: 'Product', name: "product",},
              { title: 'Desc', name: "description",},
              { title: 'Size', name: "size"},
              { title: 'Color', name: 'color'},
              { title: 'Qty.', name: 'units'},
              { title: 'Price', name: 'price'},
              { title: 'Total', name: 'subtotal'}
          ],
          controller: {
            loadData: function() {
              var d = $.Deferred();

              $.ajax({
                  type: 'GET',
                  url: 'project-page-source.php?project_name=<?php echo($project_name)?>',
                  dataType: "json",
                  success: function (data) {
                      d.resolve(data);
                  },
                  error: function(e) {
                      alert("error: " + e.responseText);
                  }
              });

              return d.promise();
          }
        }
      });
    });
  </script>
</body>
</html>
