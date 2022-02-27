<?php
session_start();

require_once 'config/connection.php';

$filename =  time() . '.jpg';
$filepath = 'images/';
$_SESSION['img'] = $filepath.$filename;

if(!is_dir($filepath))
	mkdir($filepath);

if(isset($_FILES['webcam'])){
	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
	$sql="INSERT INTO `photo`(`id_photo`, `photo`)
	VALUES ('','$filename')";
	$result=mysqli_query($connection,$sql);
	// Создание изображения
	$im = imagecreatefromjpeg($filepath.$filename);
	// Размер изображения
	$size = min(imagesx($im), imagesy($im));

	// Обрезка
	$im2 = imagecrop($im, ['x' => 233, 'y' => 0, 'width' => 354, 'height' => 472]);
	if (isset($im2)) {
		imagejpeg($im2, $filepath.$filename);
		imagedestroy($im2);
	}
	imagedestroy($im);
}

$img = $_SESSION['img'];
echo "
<center>
<h1>ЭТО ВЫ</h1>
<img src = \"$img\">
<br><br>
<a href='index.php'>НАЗАД</a>
<center>";
