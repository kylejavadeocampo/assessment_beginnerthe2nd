<?php
include '../db.php';
$dir = "http://localhost/assessment_beginner/";

$tools = mysqli_query($conn, "SELECT * FROM tools ORDER BY tool_id ASC");
$bookings = mysqli_query($conn, "SELECT * FROM bookings ORDER BY booking_id ASC");

$max_booking_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(booking_id) AS max_booking_id FROM bookings"))['max_booking_id'];

if (isset($_POST['assign'])) {
    $booking_id = $_POST['tool_name'];
    $tool_id = $_POST['tools_using'];
    $quantity_used = $_POST['quantity_total'];

    // insert into booking_tools table
    mysqli_query($conn, "INSERT INTO booking_tools (booking_id, tool_id, qty_used, created_at)
    VALUES ($booking_id, $tool_id, $quantity_used, NOW())");

    // mysqli_query($conn, "UPDATE tools SET quantity_available = quantity_available - $quantity_used WHERE tool_id = $tool_id");

    header("Location: " . $_SERVER['PHP_SELF']);
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

    <title>Document</title>
</head>
<body>
    <?php include "../nav.php"; ?>
    <div class="container mt-5">
        <div class="d-flex align-items-end justify-content-between">
            <div class=" border border-3 p-3 rounded-2 border-secondary bg-dark " style="max-width: 320px">
                <h1 style="color: white;">Tools</h1>

                <em style="color: white;">A list of tools currently in the database</em>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="justify-content-start mt-1 mb-5 border border-3 border-secondary rounded-1 p-1 shadow bg-dark" style="min-width: 600px;">
                <div class="table-responsive">
                    <table class="table table-bordered border-secondary table-dark table-striped mb-0" border="1" cellpadding="8" style="min-height: 460px;">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Total</th>
                                <th>Available</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($tools)) { ?>
                            <tr>
                                <td><?php echo $row['tool_name']; ?></td>
                                <td><?php echo $row['quantity_total']; ?></td>
                                <td><?php echo $row['quantity_available'] ?></td>
                            </tr>
                            <?php } ?>

                            <!-- so it doesnt look weird -->
                            <tr class="h-100">
                                <td colspan="5" class="border-0"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="justify-content-end mt-1 mb-5 border border-3 border-secondary rounded-1 p-1 shadow bg-dark" style="min-width: 600px;">
                <div class="container p-3">
                    <h3 style="color: white;">Assign Tool to Booking</h3>
                    <form class="mt-3" method="post">
                        <!-- tool name -->
                        <div>
                            <label for="tool_name" class="form-label" style="color: white;">Booking ID</label> <br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
                                <input type="number" min="1" max="<?php echo $max_booking_id; ?>" value=1 class="form-control" id="tool_name" name="tool_name" style="max-width: 100px;" required>
                            </div>
                        </div>

                        <!-- tool using -->
                        <div>
                            <label for="quantity_total" class="form-label" style="color: white;">Tool</label> <br>
                            <?php mysqli_data_seek($tools, 0); ?>
                            <select class="form-select border-secondary" name="tools_using" style="max-width: 300px;" required>
                                <?php while($t = mysqli_fetch_assoc($tools)) { ?>
                                    <option value="<?php echo $t['tool_id']; ?>">
                                        <?php echo $t['tool_name']; ?> (Available: <?php echo $t['quantity_available']; ?>)
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- quantity -->
                        <div class="mt-4">
                            <label for="quantity_total" class="form-label" style="color: white;">Quantity Used</label> <br>
                            <input type="number" min="1" value="1" class="form-control" id="quantity_total" name="quantity_total" style="max-width: 100px;" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-5" name="assign">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>