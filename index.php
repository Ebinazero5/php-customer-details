<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coustomers details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-9">
        <div class="card">
  
        <div class="card-header">
            <h1>customers details</h1>
        </div>

        <div class="card-body">
            
            <button class="btn btn-success"><a href="add.php" class="text-light">add new </a>  </button>

            <button class="btn btn-success"> <a href="details.php" class="text-light"> view details </a> </button> 
            
            <br/>
            <br/>

            <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">customers_name</th>
                <th scope="col">booking</th>
                <th scope="col">payment</th>
                <th scope="col">followup</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                $connection = mysqli_connect("localhost:4306","root","","cus_details");
                $sql ="select * from customers";
                $run =mysqli_query($connection,$sql);
                $id= 1;
                while($row=mysqli_fetch_array($run)){
                    $uid = $row['id'];
                    $name= $row['customers_name'];
                    $booking = $row['booking'];
                    $payment_details = isset($row['payment_details']) ? $row['payment_details'] : 'N/A';
                    $followup = $row['followup'];
                
                
                ?>
                <tr>
                
                <td><?php echo $uid ?></td>
                    
                    <td> <?php echo $name ?></td>
                    <td><?php echo $booking ?></td>
                    <td><?php echo $payment_details ?></td>
                    <td><?php echo $followup ?></td>
                    
                </tr>
                    <?php } ?>
                    

            </tbody>
        </table>
            
        </div>
        
        </div>

            </div>

        </div>

    </div>
</body>
</html>