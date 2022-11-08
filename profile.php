<?php 
  session_start();
  if(!isset($_SESSION['username']))
  {
    header("Location:index.html");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <a class="navbar-brand" href="index.html">VeriPay</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.html#bills">Upcoming Bills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Logout</a>
          </li>
          
        </ul>

      </div>
    </nav>
    <section class="content">
      <div class="container">
        <h1 class="hello">Hello, <span><?php echo $_SESSION['username'] ?></span></h1>
        <div class="row justify-content-center" style="text-align: center;">
          <div class="col-6 col-sm-10 col-lg-6 ">
            <div class="card">
              <h4>First Name:</h4>
              <p class="firstname"><?php echo $_SESSION['firstname'];?></p>
              <h4>Last Name:</h4>
              <p class="lastname"><?php echo $_SESSION['lastname'];?></p>
              <h4>Email</h4>
              <p class="emailid"><?php echo $_SESSION['email'];?></p>
              <h5>Contact Number:</h5>
              <p class="contact_no"><?php echo $_SESSION['phoneno'];?></p>
              <h5>Monthly Income: </h5>
              <p class="income">Rs. <span><?php echo $_SESSION['monthly_inc'];?></span> </p>
            </div>
          </div>
        
      </div>

    </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
