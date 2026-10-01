<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";
 
$message = "";
 
if (isset($_POST['save'])) {
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
 
  if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {
    $sql = "INSERT INTO clients (full_name, email, phone, address)
            VALUES ('$full_name', '$email', '$phone', '$address')";
    mysqli_query($conn, $sql);
    header("Location: clients_list.php");
    exit;
  }
}
?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Add Client</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">  

  </head>

  <body>
    <?php include "../nav.php"; ?>

    <div class="container mt-5">
      <div class="border border-3 rounded-1 p-4 mx-auto shadow bg-body" style="max-width: 420px">
        <h2>Add Client</h2> 
        <p style="color:red;"><?php echo $message; ?></p>
        
        <form method="post">
          <div>
            <label>Full Name*</label> <br>
            <input type="text" name="full_name" class="form-control border-secondary">
          </div>

          <div class="mt-3">
            <label>Email*</label> <br>
            <input type="text" name="email" class="form-control border-secondary">
          </div>
          
          <div class="mt-3">
            <label>Phone</label> <br>
            <input type="text" name="phone" class="form-control border-secondary">
          </div>
          
          <div class="mt-3">
            <label>Address</label> <br>
            <input type="text" name="address" class="form-control border-secondary" maxlength="11" >
          </div>
          
          <button class="mt-3 btn btn-primary" type="submit" name="save">Save</button>
          <a class="mt-3 btn btn-danger" href="clients_list.php">Cancel</a>

        </form>
      </div>
    </div>
    
  </body>
</html>