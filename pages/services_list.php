<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";

$result = mysqli_query($conn, "SELECT * FROM services ORDER BY service_id DESC");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">  
        
        <title>Services</title>
    </head>
    <body class="">
        <?php include "../nav.php"; ?>

        <div class="container mt-5">
            <h2 style="color: white;">Services</h2>
            <em style="color: white;">A list of services currently in the offer and it's cost</em>

            <table class=" mt-3 table table-bordered border-secondary table-dark table-striped" border="1" cellpadding="8">
                <tr>
                    <th>ID</th><th>Name</th><th>Rate</th><th>Active</th><th>Action</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                    <td><?php echo $row['service_id']; ?></td>
                    <td><?php echo $row['service_name']; ?></td>
                    <td>₱<?php echo number_format($row['hourly_rate'],2); ?></td>
                    <td><?php echo $row['is_active'] ? "Yes" : "No"; ?></td>
                    <td><a class="btn btn-warning text-decoration-none" href="services_edit.php?id=<?php echo $row['service_id']; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>