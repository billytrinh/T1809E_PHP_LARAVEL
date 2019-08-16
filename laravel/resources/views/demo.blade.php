<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo View</title>
</head>
<body>
    <h1>Demo view</h1>
    <ul>
        <?php foreach ($students as $student): ?>
            <li>
                <p><?php echo $student->id;?></p>
                <p><?php echo $student->name;?></p>
                <p><?php echo $student->mssv;?></p>
                <p><?php echo $student->age;?></p>
            </li>
        <?php endforeach;?>
    </ul>
</body>
</html>