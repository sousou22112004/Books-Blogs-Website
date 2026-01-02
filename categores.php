<?php
include "connect.php";
$id=$_GET['articlecat'];
$query="SELECT * from article where articlecat='$id' ";
$result=mysqli_query($con,$query) or die("erreur de connect");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($rows as $row):?>
    <h1><?php echo $row['title']?></h1>
    <?php endforeach?>
</body>
</html>