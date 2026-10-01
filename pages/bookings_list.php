<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";
 
$sql = "
SELECT b.*, c.full_name AS client_name, s.service_name
FROM bookings b
JOIN clients c ON b.client_id = c.client_id
JOIN services s ON b.service_id = s.service_id
ORDER BY b.booking_id ASC
";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">

      <title>Bookings</title>
  </head>
  <body>
    <?php include "../nav.php"; ?>
    
    <div class="container mt-5">
      <div class="d-flex align-items-end justify-content-between">
        <div class=" border border-3 p-3 rounded-2 border-secondary bg-dark " style="max-width: 320px">
          <h1 style="color: white;">Bookings</h1>

          <em style="color: white;">A list of bookings currently in the database</em>
        </div>

        <p class="btn btn-primary justify-content-end"><a style="color: white; text-decoration: none;" href="bookings_create.php">Create Booking</a></p>
      </div>

      <div class="mt-1 mb-5 border border-3 border-secondary rounded-1 p-1 mx-auto shadow bg-dark">
        <div class="table-responsive">
          <table class="table table-bordered border-secondary table-dark table-striped mb-0" border="1" cellpadding="8" style="min-height: 475px;">
            <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Client</th>
              <th>Service</th>
              <th>Date</th>
              <th>Hours</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php while($b = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $b['booking_id']; ?></td>
                  <td><?php echo $b['client_name']; ?></td>
                  <td><?php echo $b['service_name']; ?></td>
                  <td><?php echo $b['booking_date']; ?></td>
                  <td><?php echo $b['hours']; ?></td>
                  <td>₱<?php echo number_format($b['total_cost'],2); ?></td>
                  <td>
                    <?php 
                      if ($b['status'] == 'DONE') {
                        echo "<p style='color: green;'>" . $b['status'] . "</p>";
                      }
                      elseif ($b['status'] == 'PENDING') {
                        echo "<p style='color: yellow;'>" . $b['status'] . "</p>";
                      }
                      elseif ($b['status'] == 'CANCELLED') {
                        echo "<p style='color: red;'>" . $b['status'] . "</p>";
                      }
                    ?>
                  </td>
                  <td class="d-flex">
                    <a class="btn btn-warning" href="payment_process.php?id=<?php echo $b['booking_id']; ?>">Process Payment</a>
                  </td>
                </tr>
              <?php } ?>

              <!-- so it doesnt look weird -->
              <tr class="h-100">
                <td colspan="8" class="border-0"></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>


    </div>
    
  </body>
</html>