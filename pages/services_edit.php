<?php
include "../db.php";
$dir = "http://localhost/assessment_beginner/";

$id = $_GET['id'];
 
$get = mysqli_query($conn, "SELECT * FROM services WHERE service_id = $id");
$service = mysqli_fetch_assoc($get);
 
if (isset($_POST['update'])) {
  $name = $_POST['service_name'];
  $desc = $_POST['description'];
  $rate = $_POST['hourly_rate'];
  $active = $_POST['is_active'];
 
  mysqli_query($conn, "UPDATE services
    SET service_name='$name', description='$desc', hourly_rate='$rate', is_active='$active'
    WHERE service_id=$id");
 
  header("Location: services_list.php");
  exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo $dir; ?>/style.css">  

        <title>Edit Service</title>
    </head>
    <body>
        <?php include "../nav.php"; ?>
        
        <div class="container mt-5">
            <div class="border border-3 rounded-1 p-4 mx-auto shadow bg-body" style="max-width: 420px">

                <h2>Edit Service</h2>
                <form method="post">
                    <label>Service Name</label><br>
                    <input class="form-control border-secondary" type="text" name="service_name" value="<?php echo $service['service_name']; ?>"><br><br>
                    
                    <label>Description</label><br>
                    <textarea class="form-control border-secondary" name="description" rows="4" cols="40"><?php echo $service['description']; ?></textarea><br><br>
                    
                    <label>Hourly Rate</label><br>
                    <input class="form-control border-secondary" type="text" name="hourly_rate" value="<?php echo $service['hourly_rate']; ?>"><br><br>
                    
                    <label>Active</label><br>
                    <select class="form-select border-secondary" name="is_active">
                        <option value="1" <?php if($service['is_active']==1) echo "selected"; ?>>Yes</option>
                        <option value="0" <?php if($service['is_active']==0) echo "selected"; ?>>No</option>
                    </select><br><br>
                    
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                    <a class="btn btn-danger" href="services_list.php">Cancel</a>
                    
                </form> 
            </div>
        </div>
        
        
    </body>
</html>