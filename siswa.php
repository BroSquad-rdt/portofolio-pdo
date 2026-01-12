<?php 
    include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ol>
<?php 
    // menyiapkan statemen PDO menjadi resource
    $res_siswa = $db->prepare("SELECT * FROM siswa");
    // mengeksekusi resource PDO
    $res_siswa->execute();
    // melakukan loop untuk menampilkan data dari database
    while ($row_siswa = $res_siswa->fetchObject()) {
?>    
    <li><?= $row_siswa->nama ?></li>
<?php } ?>    
</ol>
</body>
</html>