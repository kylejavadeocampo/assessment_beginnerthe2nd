<?php
include "db.php";
$dir = "http://localhost/assessment_beginner/";

$clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"))['c'];
$services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"))['c'];
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"))['c'];
 
$revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
$revenue = $revRow['s'];
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">  

</head>
<body>
<?php include "nav.php"; ?>

<div class="container mt-5">

  <!-- top kpis -->
  <div class="row justify-content-evenly">

    <!-- client kpi -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-title">Clients</h5>
              <p class="card-text fst-italic text-muted" style="">total clients at this very moment</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <h5 class="card-title"><?php echo $clients; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- services kpi -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-title">Services</h5>
              <p class="card-text fst-italic text-muted" style="">total services at this very moment</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <h5 class="card-title"><?php echo $services; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- bottom kpis -->
  <div class="row justify-content-evenly mt-5">
    <!-- client kpi -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-title">Bookings</h5>
              <p class="card-text fst-italic text-muted" style="">total bookings at this very moment</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <h5 class="card-title"><?php echo $bookings; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- services kpi -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5 class="card-title">Revenue</h5>
              <p class="card-text fst-italic text-muted" style="">total Revenue at this very moment</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <h5 class="card-title"><?php echo $revenue; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-5">
    <a class="btn btn-primary" href="/assessment_beginner/pages/clients_add.php">Add Client</a>
    <a class="btn btn-warning" href="/assessment_beginner/pages/bookings_create.php">Create Booking</a>
  </div>
  
</div>

</body>
</html>