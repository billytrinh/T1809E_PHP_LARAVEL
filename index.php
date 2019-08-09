<?php
session_start();
require_once "SinhVien.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$x = 10;
$y = 3.14;
$z = "hello world";
$x = "abc xyz";

$arr = [];

$arr[0] = 102;
$arr[1] = 3.14;
$arr[2] = "good";
$arr[3] = [];
$arr["age"] =  18;

$sinhvien = [
    "name" => "nguyen van A",
    "age" => 20,
    "sdt"  => "0987654321",
    "gallery" => ["anh1.png","anh2.png"]
];

echo "<h1>".$z."</h1>";
?>
<h2>Thong tin sinh vien</h2>
<?php
    echo $sinhvien["name"]."<br/>";
    echo $sinhvien["age"]."<br/>";
    echo $sinhvien["sdt"]."<br/>";
    foreach ($sinhvien["gallery"] as $g){
        echo $g."<br/>";
    }
    $std = new StdClass();
    $std->name  = "Le van A";
    $std->age = 22;
    echo $std->name;

    function sayHello(){
        echo "say hello";
    }
    sayHello();

    function tinh_tong($x,$y){
        echo $x+$y;
        echo "<br/>";
    }
    tinh_tong(4,5);
    tinh_tong("aaa","bbb");
    $sv = new SinhVien("nguyen van anh",25);
    echo $sv->getName();
?>
<h1>Username: <?php echo $_SESSION["user"]["username"];?></h1>
<h1>password: <?php echo $_SESSION["user"]["password"];?></h1>
</body>
</html>