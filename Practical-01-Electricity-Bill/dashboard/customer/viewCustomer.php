<?php
require_once "../db.php";

$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-primary text-white">

            <h3>Customer List</h3>

        </div>

        <div class="card-body">

            <a href="addCustomer.php" class="btn btn-success mb-3">
                Add Customer
            </a>

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Mobile</th>
                    <th>Meter No.</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                <?php

                while($row = mysqli_fetch_assoc($result))
                {

                ?>

                <tr>

                    <td><?php echo $row['customer_id']; ?></td>

                    <td><?php echo $row['customer_name']; ?></td>

                    <td><?php echo $row['customer_type']; ?></td>

                    <td><?php echo $row['mobile']; ?></td>

                    <td><?php echo $row['meter_number']; ?></td>

                    <td><?php echo $row['status']; ?></td>

                    <td>

                        <a href="editCustomer.php?id=<?php echo $row['customer_id']; ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="deleteCustomer.php?id=<?php echo $row['customer_id']; ?>" class="btn btn-danger btn-sm">
                            Delete
                        </a>

                    </td>

                </tr>

                <?php
                }
                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>