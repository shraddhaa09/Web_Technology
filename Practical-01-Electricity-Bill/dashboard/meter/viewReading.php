<?php
require_once "../db.php";

$sql = "SELECT * FROM meterreading ORDER BY readingId DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>

    <title>View Meter Readings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-primary text-white">

            <h3>Meter Reading List</h3>

        </div>

        <div class="card-body">

            <a href="addReading.php" class="btn btn-success mb-3">

                Add New Reading

            </a>

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                <tr>

                    <th>Reading ID</th>

                    <th>Customer ID</th>

                    <th>Previous Reading</th>

                    <th>Current Reading</th>

                    <th>Units Consumed</th>

                    <th>Reading Date</th>

                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                <?php

                while($row = mysqli_fetch_assoc($result))
                {

                ?>

                <tr>

                    <td><?php echo $row['readingId']; ?></td>

                    <td><?php echo $row['customerId']; ?></td>

                    <td><?php echo $row['previousReading']; ?></td>

                    <td><?php echo $row['currentReading']; ?></td>

                    <td><?php echo $row['unitsConsumed']; ?></td>

                    <td><?php echo $row['readingDate']; ?></td>

                    <td>

                        <a href="editReading.php?id=<?php echo $row['readingId']; ?>"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="deleteReading.php?id=<?php echo $row['readingId']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this reading?')">

                            Delete

                        </a>

                    </td>

                </tr>

                <?php

                }

                ?>

                </tbody>

            </table>

            <a href="../index.php" class="btn btn-secondary">

                Dashboard

            </a>

        </div>

    </div>

</div>

</body>

</html>