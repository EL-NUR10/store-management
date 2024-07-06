<?php
$connect = mysqli_connect('localhost','root','1234567890','store_management');

if (!$connect) {
    die("There is an error in your connection: " . "<b>" . mysqli_connect_error() . "</b>");
}
?>