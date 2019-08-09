<?php

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
    VALUES ('abcxyz','abc@gmail.com','123456')";
//$conn->query($insert_sql);

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if($result->num_rows > 0){
    //var_dump($result);
    while ($row = $result->fetch_assoc()){
        echo $row["id"]."-".$row["username"]."-".
            $row["email"]."-".$row["password"]."<br/>";
    }
}
