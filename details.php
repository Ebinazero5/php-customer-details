<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    
        <div class="row">
        <div class="col-md-9">
        <div class="card">

        <div class="card-header">
        <h2>Customer Details</h2>
        </div>

        <div class="card-body">
        
        <form class="search-form" action="details.php" method="get">
            <!-- <input type="text" name="search" placeholder="Search by customers_name, booking, payment, or followup"> -->


        <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" class="form-control" name="search" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

            <input class="btn btn-success" type="submit" value="Search">
        </form>
        <table table class="table">
            <tr>
                <th>ID</th>
                <th>customers_name</th>
                <th>booking</th>
                <th>payment</th>
                <th>followup</th>
            </tr>
            <?php
            // Database connection parameters
            $host = "localhost:4306";
            $username = "root";
            $password = "";
            $dbname = "cus_details";

            // Create connection using MySQLi
            $connection = new mysqli($host, $username, $password, $dbname);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Search functionality
            $search = isset($_GET['search']) ? $connection->real_escape_string($_GET['search']) : '';
            $query = "SELECT * FROM customers";
            if ($search) {
                $query .= " WHERE customers_name LIKE '%$search%' OR booking LIKE '%$search%' OR payment LIKE '%$search%' OR followup LIKE '%$search%'";
            }

            // Fetching customer details from the database
            $result = $connection->query($query);
           
            // Check if the query was successful
            if ($result->num_rows > 0) {
                // Fetch each row of the result
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['customers_name'] . "</td>";
                    echo "<td>" . $row['booking'] . "</td>";
                    echo "<td>" . $row['payment'] . "</td>";
                    echo "<td>" . $row['followup'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No customer data found.</td></tr>";
            }

            // Free result set
            $result->free();

            // Closing the connection
            $connection->close();
            ?>
        </table>
        </div>
        </div>
        </div>
        </div>
    </div>
</body>
</html>
