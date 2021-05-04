<?php 

$server = "localhost";
$user = "newuser";
$pass = "P4\$\$w0rd123";
$database = "login_register";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>