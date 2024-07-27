<?php

$connection = mysqli_connect("localhost:4306","root","","cus_details"); 
if(isset($_POST['submit']))
        {
            
          $name = $_POST['customers_name'];
          $booking = $_POST['booking'];
         $payment_details=$_POST['payment'];
         $followup =$_POST['followup'];


    $sql = "insert into customers(customers_name,booking,payment,followup)values(' $name',' $booking','$payment_details','$followup')";

           if(mysqli_query($connection,$sql))
           {
                  echo '<script> location.replace("index.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;
           }
        
    }
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student crud application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-9">
        <div class="card">
  
        <div class="card-header">
            <h1>booking details</h1>
        </div>

        <div class="card-body">
            
        <form action="add.php" method="post">
            <div class="form-group">
                <label >name</label>
                <input type="text" name="customers_name" class="form-control"  placeholder="Enter name">
            </div>

            <div class="form-group">
                <label >booking</label>
                <input type="text" name="booking" class="form-control"  placeholder="booking details">
            </div>

            <div class="form-group">
                <label >payment details</label>
                <input type="text" name="payment details" class="form-control"  placeholder="payment details">
            </div>

            <div class="form-group">
                <label >followup</label>
                <input type="text" name="followup" class="form-control"  placeholder="followup employ name">
            </div>

            
            <br/>
            <input type="submit" class="btn btn-primary" name="submit" value="Register">
        </form>
            
            
        </div>
        
        </div>

            </div>

        </div>

    </div>
</body>
</html>