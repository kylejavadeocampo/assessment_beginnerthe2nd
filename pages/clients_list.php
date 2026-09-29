<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";

$result = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id DESC");
?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Clients</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">  

  </head>
  <body>
    <?php include "../nav.php"; ?>

    <div class="container mt-5">
      <h1 style="color: white;">Clients</h1>

      <div class="d-flex justify-content-between align-items-center">
        <em style="color: white;">A list of clients currently in the database</em>

        <p class="btn btn-primary justify-content-end"><a style="color: white; text-decoration: none;" href="clients_add.php">Add Client</a></p>
      </div>

      <table class="table table-bordered border-secondary table-dark table-striped" border="1" cellpadding="8">
        <tr>
          <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th>
        </tr>
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
      </table>
    </div>
  </body>
</html>