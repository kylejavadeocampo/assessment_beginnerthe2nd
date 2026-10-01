<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";

$id = $_GET['id'];

$booking = mysqli_query($conn, "SELECT * FROM bookings WHERE booking_id = $id");
$get = mysqli_fetch_assoc($booking);

if (isset($_POST['process'])) {
    // Process payment logic here
    // For example, update the booking status to 'PAID' in the database
    mysqli_query($conn, "UPDATE bookings SET status='PAID' WHERE booking_id=$id");
    
    header("Location: bookings_list.php");
    exit;
}

?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">

    <title>Payment</title>
</head>
<body>
    <?php include "../nav.php"; ?>

    <div class="container mt-5">
        <div class="border border-3 rounded-1 p-4 mx-auto shadow bg-body" style="max-width: 420px">
            <h2>Proccess Payment</h2>
            
            <form method="post">

                <div class="mt-3">
                    <label for="tool_name" class="form-label">Booking ID</label> <br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
                        <input type="number" value="<?php echo $id; ?>" class="form-control" id="id" name="id" style="max-width: 50px;" readonly>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="tool_name" class="form-label">Payment</label> <br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">₱</span>
                        <input type="number" value="<?php echo $get['total_cost']; ?>" class="form-control" id="amount" name="amount" style="max-width: 120px;" required>
                    </div>
                </div>
                
            </form>
      </div>
    </div>
    
</body>
</html>