<?php
include "db.php";
$dir = "http://localhost/assessment_beginner/";

$user = "admin";
$pass = "admin";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $user && $password === $pass) {
        header("Location: index.php");
    }
    else {
        echo "<script>alert('Invalid username or password!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">  

    <title>Document</title>
</head>
<body>
    <div class="container align-items-center justify-content-center d-flex" style="height: 100vh;">
      <div class="border border-3 rounded-1 p-4 mx-auto shadow bg-body" style="min-width: 420px">
        <h2 class="justify-content-center d-flex">Login</h2>
        
        <form method="post">
          <div>
            <label>Username</label> <br>
            <input type="text" name="username" class="form-control border-secondary">
          </div>

          <div class="mt-3">
            <label>Password</label> <br>
            <input type="password" name="password" class="form-control border-secondary">
          </div>
          
          <div class="justify-content-center d-flex">
            <button class="mt-3 btn btn-primary" type="submit" name="login">Login</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>