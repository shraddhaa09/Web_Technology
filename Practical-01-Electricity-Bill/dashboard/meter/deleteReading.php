<?php
require_once "../db.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM meterreading WHERE readingId='$id'";

    if(mysqli_query($conn, $sql))
    {
        header("Location:viewReading.php");
        exit();
    }
    else
    {
        echo "Error : " . mysqli_error($conn);
    }
}
else
{
    header("Location:viewReading.php");
    exit();
}
?>