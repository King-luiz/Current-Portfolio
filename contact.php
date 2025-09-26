<?php

$NAME = $_POST['fullname'];
$EMAIL = $_POST['email'];
$SUBJECT= $_POST['message'];


$host = "localhost";
$dbname = "connect";
$username = "root";
$password = "";

//mysql connect()
$conn = mysqli_connect(hostname: $host,
               username: $username,
               password: $password,
               database: $dbname);

if (mysqli_connect_error ()) {
    die("connection error:"  . mysqli_connect_error());
}
$sql = "INSERT INTO contactme (fullname,email,message)
VALUE ( ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
   die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sss",
                       $fullname,
                      $email,
                     $message);

mysqli_stmt_execute($stmt);


echo "Record saved";

//codewithluiz
