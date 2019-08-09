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
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if($result->num_rows > 0){
    //var_dump($result);
    while ($row = $result->fetch_assoc()){
        echo $row["id"]."-".$row["username"]."-".
            $row["email"]."-".$row["password"]."<br/>";
    }
}