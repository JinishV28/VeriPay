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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/77ca180115.js" crossorigin="anonymous"></script>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
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
                <a class="nav-link" href="index.html">Home</a>
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
                <a class="nav-link" href="logout.php">Logout</a>
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
          <div class="col-3">
            <div class="card px-3 py-2" style="color:white; background-color:#2d2d2d;">
              <h5 class="text-center mt-1 mb-1">
              <i class="fa-regular fa-clock"></i>
                <span><?php date_default_timezone_set('Asia/Calcutta'); 
              echo date("d.m.Y") . " ". date("h:ia"); ?></span></h5>     
            </div>       
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card card-1">
              <h2>Income</h2><br>
              <p class="amt card-1"><?php echo "Rs. ".$_SESSION['monthly_inc'];?></p>
            </div>
          </div>
          <div class="col">
            <div class="card card-2">
              <h2>Expenditure</h2><br>
              <p class="amt card-2">Rs. NAN</p>
            </div>
          </div>
          <div class="col">
            <div class="card card-3">
              <h2>Balance</h2><br>
              <p class="amt card-3">Rs. NAN</p>
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
              <!-- Button trigger modal -->
              <div class="row">
                <div class="col-3">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadedExpenses">
                    Uploaded Expenses
                  </button>
                </div>
              </div>
              <br>
              <!-- Modal -->
              <div class="modal fade modal-lg" id="uploadedExpenses"  role="dialog">
                <div class="modal-dialog" role="content">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalBody">
                      <p id="noRecord"></p>
                      <br>
                      <div class="row-content" id="table">
                          <table class="table table-striped">
                              <thead style="font-style: bold;">
                              <tr>
                                <th>USERNAME</th>
                                <th>DATE</th>
                                <th>AMOUNT</th>
                                <th>TYPE</th>
                                <th>CATEGORY</th>
                                <th>CUSTOMER ID</th>
                              </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

              <form id="expenseForm" action="">
                  <label for="basic-url" class="form-label">Upload Bill amount</label>
                  <div class="input-group mb-3 ">
                    <span class="input-group-text">Rs.</span>
                    <input type="number" name="amt" class="form-control" aria-label="Amount (to the nearest Rupee)" required>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label class="form-label" >Select Expense Type</label>
                      <div class="input-group mb-3">
                        <select name="type" id="billType" class="form-select" id="inputGroupSelect01" required>
                          <option value="" selected>Choose</option>
                          <option class="bill" value="Bill" for="billType">Bill</option>
                          <option class="other" value="Other">Other Expense</option>
                        </select>
                      </div>
                    </div>                    
                  </div>
                  <div class="row">                    
                    <div class="col-4" id="category" >
                      <label class="form-label" >Select Category</label>
                      <select class="form-select col-4" name="category" aria-label="" required>
                        <option value="" selected>Select Type First</option>
                        <option class="bill" value="Electricity Bill">Electricity Bill</option>
                        <option class="bill" value="Gas Bill">Gas Bill</option>
                        <option class="bill" value="Telephone Bill">Telephone Bill</option>
                        <option class="other" value="Food">Food </option>
                        <option class="other" value="Clothes">Clothes</option>
                        <option class="other" value="Transport">Transport</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-6">
                      <label class="form-label" >Enter Customer ID:</label>
                      <input type="text" class="form-control" name="customer_id" placeholder="Customer ID" id="customer_id" required>
                    </div>                    
                  </div>
                  <!-- <div class="row mt-4">
                    <div class="mb-3 col-4">
                     <label for="formFile" class="form-label">Upload bill below</label>
                      <input name="upload" class="form-control" type="file" id="formFile">
                    </div>
                  </div> -->  
                  <input class="btn btn-primary mt-4" type="submit" id="upload_expense" value="Upload Expense">
              </form>
              <br>
              <div id="alert" class="alert"></div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <?php
      require "dbconnection.php";

      $username = $_SESSION['username'];
      $sql = "Select * from expenses where username='$username'";
      $result = $conn->query($sql);
      $rows = array();
      while($row = mysqli_fetch_array($result, MYSQLI_NUM))
      {
        array_push($rows,$row);
      }
  ?>
  
  <script>
    $(document).ready(function(){
      var rows = JSON.parse('<?= json_encode($rows) ?>');
      console.log(rows);
      var alert = document.getElementById("alert");
      $("#category option").hide();
      $("#billType").on('change', function(e){
        var selected = $('select[name="type"] :selected').attr('class');
        $("#category option").hide();
        $("#customer_id").prop('disabled',true);
        $("#category option[class="+selected+"]").show();
        if(selected == "bill"){
          $("#customer_id").prop('disabled',false);
        }
      });
      $("#expenseForm").submit(function(e){
        console.log("clicked")
        const form = $("#expenseForm")[0];
        fetch("uploadExpense.php", {
        method : "POST",
        body: new FormData(form)
        })
        .then(response=>response.json())
        .then(json =>
        {
          if(json[0] == 1){
              alert.classList.add("alert-success");
              alert.innerHTML = "<center><b>Uploaded successfully.<b><center>";     
            }
          else{
            alert.classList.add("alert-danger");
            alert.innerHTML = "<center><b>Incorrect Customer Id. Try Again<b><center>";
          }
        })
        return false;
      });
      $("#uploadedExpenses").on('show.bs.modal',function(){
        var table = document.getElementById('table');
        var length = Object.keys(rows).length;
        console.log(length);
        if(length>0)
        {
          table.style.display = "block";
          document.getElementById("noRecord").innerHTML = ``;
          document.getElementById("tableBody").innerHTML = ``;
          var tRows= ``;
          let i = 0;
          let j = 0;
          for(i=0;i<length;i++)
          {
            tRows+=`<tr>`;
            for(j=0;j<=5;j++)
            {
              tRows+=`<td>${rows[i][j]}&nbsp;</td>`;
            }
            tRows+=`</tr>`;
            document.getElementById("tableBody").innerHTML = tRows;
          }
        }
        else{
            table.style.display = "none";
            document.getElementById("noRecord").innerHTML = `<b>Hurray! No Expenses.<b>`;
        }
      });


    });
  </script>

</body>

</html>
