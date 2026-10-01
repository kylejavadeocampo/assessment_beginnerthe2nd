<?php // nav.php ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid mx-5"> 
    <a class="navbar-brand" href="/assessment_beginner/index.php"> Dashboard</a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="/assessment_beginner/pages/clients_list.php">Clients</a></li>
        <li class="nav-item"><a class="nav-link active" href="/assessment_beginner/pages/services_list.php">Services</a></li>
        <li class="nav-item"><a class="nav-link active" href="/assessment_beginner/pages/bookings_list.php">Bookings</a></li>
        <li class="nav-item"><a class="nav-link active" href="/assessment_beginner/pages/tools_list.php">Tools</a></li>
        <li class="nav-item"><a class="nav-link active" href="/assessment_beginner/pages/payments_list.php">Payments</a></li>
        <li class="nav-item"><a class="btn btn-danger" href="/assessment_beginner/login.php" onclick="return confirm('Are you sure you want to logout?')"><i class="bi bi-indent"></i></a></li>
      </ul>
    </div>
  <div>
</nav>