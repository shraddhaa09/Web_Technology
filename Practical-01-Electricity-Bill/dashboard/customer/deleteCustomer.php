<?php

require_once "../db.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM customer WHERE customer_id='$id'");

header("Location:viewCustomer.php");

?>