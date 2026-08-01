<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "electricity_bill"
);

if(!$conn)
{
    die("Connection Failed");
}
echo "DB Loaded";

?>