<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";

$result = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id ASC");
?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Clients</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">  

  </head>
  <body>
    <?php include "../nav.php"; ?>

    <div class="container mt-5">
      <div class="d-flex align-items-end justify-content-between">
        <div class=" border border-3 p-3 rounded-2 border-secondary bg-dark " style="max-width: 320px">
          <h1 style="color: white;">Clients</h1>

          <em style="color: white;">A list of clients currently in the database</em>
        </div>

        <p class="btn btn-primary justify-content-end"><a style="color: white; text-decoration: none;" href="clients_add.php">Add Client</a></p>
      </div>

      

      <div class="mt-1 mb-5 border border-3 border-secondary rounded-1 p-1 mx-auto shadow bg-dark">
        <div class="table-responsive">
          <table class="table table-bordered border-secondary table-dark table-striped mb-0" border="1" cellpadding="8" style="min-height: 475px;">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['client_id']; ?></td>
                  <td><?php echo $row['full_name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td class="d-flex">
                    <a class="btn btn-warning" href="clients_edit.php?id=<?php echo $row['client_id']; ?>">Edit</a>
                  </td>
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

    </div>
  </body>
</html>