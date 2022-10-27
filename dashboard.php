<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <a class="navbar-brand" href="">VeriPay</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#bills">Upcoming Bills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Logout</a>
          </li>
          <!-- <li class="nav-item">
              <button class="btn btn-primary " type="button" style="font-family: Montserrat;" data-bs-toggle="modal" data-bs-target="#signUp">Sign Up</button>
          </li> -->

        </ul>

      </div>
    </nav>
    <section class="content">
      <div class="container">
        <h1 class="hello">Hello, <span><?php echo $_SESSION['username']; ?></span></h1>
        <div class="row">
          <div class="col">
            <div class="card">
              <h2>Income</h2><br>
              <p class="amt">Rs. 25000</p>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h2>Expenditure</h2><br>
              <p class="amt">Rs. 2000</p>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h2>Balance</h2><br>
              <p class="amt">Rs. 23000</p>
            </div>
          </div>
        </div>
        <div class="row " id="bills">
          <div class="col">
            <div class="card">
              <h2>Upcoming Bills</h2><br>
            </div>
          </div>
        </div>
      </div>

    </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
