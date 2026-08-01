<?php
require_once "../db.php";

if(isset($_GET['id']))
{
    $billId = $_GET['id'];

    $sql = "DELETE FROM bill WHERE billId='$billId'";

    if(mysqli_query($conn,$sql))
    {
        header("Location:viewBill.php");
        exit();
    }
    else
    {
        echo "Error : " . mysqli_error($conn);
    }
}
else
{
    header("Location:viewBill.php");
    exit();
}
?>