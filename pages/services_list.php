<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";

$result = mysqli_query($conn, "SELECT * FROM services ORDER BY service_id ASC");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">
        
        <title>Services</title>
    </head>
    <body>
        <?php include "../nav.php"; ?>

        <div class="container mt-5">
            <div class="d-flex align-items-end justify-content-between">
                <div class=" border border-3 p-3 rounded-2 border-secondary bg-dark " style="max-width: 320px">
                <h1 style="color: white;">Services</h1>

                <em style="color: white;">A list of services currently in the database</em>
                </div>

            </div>

            <div class="mt-1 mb-5 border border-3 border-secondary rounded-1 p-1 mx-auto shadow bg-dark">
                <div class="table-responsive">
                    <table class="table table-bordered border-secondary table-dark table-striped mb-0" border="1" cellpadding="8" style="min-height: 460px;">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Rate</th>
                                <th>Active</th>
                                <th>Action

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                            <td><?php echo $row['service_id']; ?></td>
                            <td><?php echo $row['service_name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>₱<?php echo number_format($row['hourly_rate'],2); ?></td>
                            <td>
                                <?php 
                                    if ($row['is_active'] == 1) {
                                        echo "<p style='color: green;'> Yes </p>";
                                    }
                                    else {
                                        echo "<p style='color: red;'> No </p>";
                                    }
                                ?>
                            </td>
                            <td><a class="btn btn-warning text-decoration-none" href="services_edit.php?id=<?php echo $row['service_id']; ?>">Edit</a></td>
                            </tr>
                        <?php } ?>
                        <!-- so it doesnt look weird -->
                        <tr class="h-100">
                            <td colspan="6" class="border-0"></td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>