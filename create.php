<?php
include "connect.php";

$querys = "SELECT * FROM Article_categorey";
$result = mysqli_query($con, $querys) or die('Erreur de requête');
$Categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (isset($_POST['submit'])) {
    extract($_POST);
    $source2 = $_FILES['image']['tmp_name'];
    $filename2 = $_FILES['image']['name'];
    $destination2 = "imag/" . $filename2;

    move_uploaded_file($source2, $destination2);
   $query = "INSERT INTO article (title, text1, text2, image, articlecat)
          VALUES ('$title', '$text1', '$text2', '$destination2', '$articlecat')";

    mysqli_query($con, $query) or die("Erreur de requête");


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="title">
        <textarea name="text1" id=""></textarea>
        <textarea name="text2" id=""></textarea>
        <input type="file" name="image">
        <select name="articlecat" id="">
        <?php foreach ($Categories as $Categorie):?>
            <option value="<?= $Categorie['articlecat'] ?>"><?php echo $Categorie['articlecat'] ?></option>
        <?php endforeach?>
        </select>
        <button type="submit" name="submit">sifti</button>
    </form>
</body>
</html>