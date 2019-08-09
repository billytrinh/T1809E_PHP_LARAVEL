<?php
session_start();
$name = $_POST["username"];
$email = $_POST["email"];
//$name = $_GET["username"];
$pass = $_POST['password'];


$server = "localhost";
$userDB = "root";
$passDB = "root";
$dbName = "T1809E";

// Create connection
$conn = new mysqli($server,$userDB,$passDB,$dbName);

if($conn->connect_error){
    die("Connect Error");
}
//echo "connect success";
$insert_sql = "INSERT INTO USER (username,email,password) 
    VALUES ('".$name."','".$email."','".$pass."')";
$conn->query($insert_sql);


$_SESSION["user"] = [
    "username" => $name,
    "password" => $pass
];
//$pass = $_GET['password'];
echo "Vua dang nhap theo thong tin <br/>";
echo "name: ".$name."<br/>";
echo "pass: ".$pass.'<br/>';
