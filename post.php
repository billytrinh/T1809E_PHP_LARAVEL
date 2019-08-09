<?php
session_start();
$name = $_POST["username"];
//$name = $_GET["username"];
$pass = $_POST['password'];

$_SESSION["user"] = [
    "username" => $name,
    "password" => $pass
];
//$pass = $_GET['password'];
echo "Vua dang nhap theo thong tin <br/>";
echo "name: ".$name."<br/>";
echo "pass: ".$pass.'<br/>';
