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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="css/dashboard.css">
  <link rel="stylesheet" href="css/profile.css">


  <script>
      function showResult(str) {
        if (str.length==0) {
          document.getElementById("livesearch").innerHTML="";
          document.getElementById("livesearch").style.border="0px";
          return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
          }
        }
        xmlhttp.open("GET","livesearch.php?q="+str,true);
        xmlhttp.send();
      }
    </script>
</head>

<body>

    <!-- Navigation Bar -->
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
              <form class="d-flex mb-3 justify-content-end" role="search" >
              <input class="form-control me-5 ms-4 mt-4" type="search" placeholder="Search" aria-label="Search" size="10" onkeyup="showResult(this.value)">              
            </form>
            <div id="livesearch" class="livesearch"></div>
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="profile.php">Profile</a>
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
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

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
    </nav> -->
    <section class="content">
    <div class="container">
      <div class="card mt-5 col-6 col-lg-6 col-sm-10 mx-auto text-center">
        <div class="profile-header">
          <div class="bg">
            <!-- <img src="blur-bg.jpg" alt=""> -->
          </div>
        </div>
          <div class="circle mb-0">
            <img src="images/find_user.png" alt="User-image" class="user-img">
          </div>
          <h1 class="hello text-center">Hello, <span><?php echo $_SESSION['username'] ?></span></h1>
          <div class="row px-4 py-1 mt-5 detail-item">
            <div class="col">
              
                <h5>First Name:</h5>
            </div>
            <div class="col">
                <p class="firstname mb-0"><?php echo $_SESSION['firstname'];?></p>
            </div>
          </div>
          <div class="row px-4 py-1 detail-item">
                <div class="col">
                  <h5>Last Name:</h5>
                </div>
                <div class="col">
                  <p class="lastname mb-0"><?php echo $_SESSION['lastname'];?></p>
                </div>
          </div>
          <div class="row px-4 py-1 detail-item">
                <div class="col">
                  <h5>Email:</h5>
                </div>
                <div class="col">
                <p class="emailid mb-0"><?php echo $_SESSION['lastname'];?></p>
                </div>
          </div>
          <div class="row px-4 py-1 detail-item">
                <div class="col">
                  <h5>Contact Number:</h5>
                </div>
                <div class="col">
                  <p class="contact_no mb-0"><?php echo $_SESSION['phoneno'];?></p>
                </div>
          </div>
          <div class="row px-4 py-1 mb-5 detail-item">
                <div class="col">
                  <h5>Monthly Income: </h5>
                </div>
                <div class="col">
                  <p class="income mb-0">Rs. <span><?php echo $_SESSION['monthly_inc'];?></span> </p>
                </div>
          </div>

        

      </div>

    </div>
      <!-- <div class="container">
        <h1 class="hello text-center">Hello, <span><?php echo $_SESSION['username'] ?></span></h1>
        <div class="row justify-content-center" style="text-align: center;">
          <div class="col-6 col-sm-10 col-lg-8 ">
            <div class="card" style="text-align:left; padding: auto 4rem; background-color:#f3f3f3;">
              <div class="row px-4">
                <div class="col">
                <h4>First Name:</h4>
                </div>
                <div class="col">
                <p class="firstname"><?php echo $_SESSION['firstname'];?></p>
                </div>
              </div>
              <div class="row px-4">
                <div class="col">
                  <h4>Last Name:</h4>
                </div>
                <div class="col">
                  <p class="lastname"><?php echo $_SESSION['lastname'];?></p>
                </div>
              </div>
              <div class="row px-4">
                <div class="col">
                  <h4>Email:</h4>
                </div>
                <div class="col">
                <p class="emailid"><?php echo $_SESSION['lastname'];?></p>
                </div>
              </div>
              <div class="row px-4">
                <div class="col">
                <h4>Contact Number:</h4>
                </div>
                <div class="col">
                <p class="contact_no"><?php echo $_SESSION['phoneno'];?></p>
                </div>
              </div>
              <div class="row px-4">
                <div class="col">
                <h4>Monthly Income: </h4>
                </div>
                <div class="col">
                <p class="income">Rs. <span><?php echo $_SESSION['monthly_inc'];?></span> </p>
                </div>
              </div>

            </div>
          </div>
        
      </div> -->

    </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
