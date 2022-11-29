<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    echo json_encode([
        'a' => 201
    ]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="xd.php">
        <div>
            <input type="hidden" name="data" value="no"/>
            <input type="checkbox" name="data" value="si"/>HTML
        </div>
        <div>
            <input type="hidden" name="data1" value="no1"/>
            <input type="checkbox" name="data1" value="si1"/>CSS
        </div>
        <div>
            <input type="hidden" name="data2" value="no2"/>
            <input type="checkbox" name="data2" value="si2"/>PHP
        </div>
        <button name="submit" type="submit">a</button>
    </form>
    
</body>
</html>
