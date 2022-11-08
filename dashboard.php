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
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="css/dashboard.css">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 

</head>

<body>

    <!-- Navigation Bar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

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
            <a class="nav-link" href="#bills">Upload Expenses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>

      </div>
    </nav> -->
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand mx-4" href="#">VeriPay</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">VeriPay</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Expenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="imdex.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- End of Navbar -->

    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col">
          <h1 class="hello ">Hello, <span><?php echo $_SESSION['username'] ?></span></h1>
          </div>
          <div class="col">
            <h5 class="mt-5 text-end"><span><?php date_default_timezone_set('Asia/Calcutta'); 
            echo date("d.m.Y") . " ". date("h:ia"); ?></span></h5>
            
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="card">
              <h2>Income</h2><br>
              <p class="amt"><?php echo $_SESSION['monthly_inc'];?></p>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h2>Expenditure</h2><br>
              <p class="amt">Rs. NAN</p>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h2>Balance</h2><br>
              <p class="amt">Rs. NAN</p>
            </div>
          </div>
        </div>
        
        <div class="row justify-content-center">
          <div class="col">
            <div class="card" style="padding-bottom: 2rem;">
              <h2>Monthly Expense Chart</h2><br>

                  <div class="chart-container mb-3">
                    <canvas id="chart" height="80px"></canvas>
                  </div>
                  <br>
                
                  <div class="chart-container1" >
                    <canvas id="piechart" height="180px"></canvas>
                  </div>



              
            </div>
          </div>
        </div>
        <div class="row " id="bills">
          <div class="col">
            <div class="card" style="margin-bottom: 2rem;">
              <h2>Upload Expenses</h2><br>
              <div class="mb-3 col-4">
                <!-- <label for="formFile" class="form-label">Upload bill below</label> -->
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>
          </div>
        </div>
      </div>
      

    </section>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <script>
      const ctx = document.getElementById("chart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Food", "Apparel", "Household", "Health",
          "Education", "Transportation", "Social Life"],
          datasets: [{
            label: 'Expenditure',
            backgroundColor: ['rgba(161, 198, 247, 1)', 'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(75, 192, 192)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)'],
            borderColor: ['rgb(47, 128, 237)', 'rgba(255,99,132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(75, 192, 192)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)'],
            data: [300, 400, 200, 500, 800, 900, 200],
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
</script>
<script>
      const ctx1 = document.getElementById("piechart").getContext('2d');
      const myPieChart = new Chart(ctx1, {
        type: 'pie',
        data: {
          labels: ["Food", "Apparel", "Household", "Health",
          "Education", "Transportation", "Social Life"],
          datasets: [{
            label: 'food Items',
            backgroundColor: ['rgba(23, 155, 147)', 'rgba(30, 199, 189)',
        'rgba(56, 225, 215)',
        'rgba(100, 232, 224)',
        'rgba(144, 238, 233)',
        'rgba(189, 245, 242)',
        'rgba(233, 252, 251)'],
            borderColor:  ['rgba(23, 155, 147)', 'rgba(30, 199, 189)',
        'rgba(56, 225, 215)',
        'rgba(100, 232, 224)',
        'rgba(144, 238, 233)',
        'rgba(189, 245, 242)',
        'rgba(233, 252, 251)'],
            data: [30, 40, 20, 50, 80, 90, 20],
          }]
        },
      });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
