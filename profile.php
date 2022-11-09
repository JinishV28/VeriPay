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
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php#bills">Expenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
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
    <!-- <style>
              .file-upload {
                  display: none;
              }
              .fa{
                font-size: 1.8rem;
                  color: #069b92;
              }
                .p-image {
                  position: absolute;
                  top: 110px;
                  right: 10px;
                  font-size:1.8rem;
                  color: #1f8982;
                  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
                }
                .p-image:hover {
                  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
                }
                .upload-button {
                  font-size: 1.2em;
                }
                
                .upload-button:hover {
                  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
                  color: #1f8982;
                }
          </style> -->

    <section class="content">
    <div class="container">
      <div class="card mt-5 col-6 col-lg-6 col-sm-10 mx-auto text-center" style="padding-bottom:5em;">
        <div class="profile-header">
          <div class="bg">
            <!-- <img src="blur-bg.jpg" alt=""> -->
          </div>
        </div>
          <div class="circle mb-0 " id="display-image">
                        <!-- User-Image -->
            <!-- <img src="images/find_user.png" alt="User-image" id="user-img" class="user-img profile-pic">
             -->
          </div>
          <!-- <div class="p-image">
            <i class="fa fa-camera upload-button"></i>
              <input class="file-upload" type="file" accept="image/*"/>
            </div> -->

          <p class="text-end mt-5 pt-5" style="font-size:12px; padding-right: 3.5rem;">Upload Display picture: 
          <input type="file" id="image-input" name="profile_img" accept="image/jpeg, image/png, image/jpg">
          <script>
                    const image_input = document.querySelector("#image-input");

                    image_input.addEventListener("change", function() {
                      const reader = new FileReader();
                      reader.addEventListener("load", () => {
                        const uploaded_image = reader.result;
                        document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
                      });
                      reader.readAsDataURL(this.files[0]);
                    });
                  </script>
          </p>
          <h1 class="hello mt-3 text-center">Hello, <span><?php echo $_SESSION['username'] ?></span></h1>
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
                <p class="emailid mb-0"><?php echo $_SESSION['email'];?></p>
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
          <div class="row px-4 py-1  detail-item">
                <div class="col">
                  <h5>Monthly Income: </h5>
                </div>
                <div class="col">
                  <p class="income mb-0">Rs. <span><?php echo $_SESSION['monthly_inc'];?></span> </p>
                </div>                
          </div>        

      </div>
    </div>
      

    </section>

    <!-- <script >
            $(document).ready(function() {
              var readURL = function(input) {
                  if (input.files && input.files[0]) {
                      var reader = new FileReader();

                      reader.onload = function (e) {
                          $('.profile-pic').attr('src', e.target.result);
                      }

                      reader.readAsDataURL(input.files[0]);
                  }
              }

              $(".file-upload").on('change', function(){
                  readURL(this);
              });

              $(".upload-button").on('click', function() {
                $(".file-upload").click();
              });
              });
       </script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>
