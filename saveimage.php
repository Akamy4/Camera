<?php
require_once 'config/connection.php';

$filename =  time() . '.jpg';
$filepath = 'images/';

if(!is_dir($filepath))
	mkdir($filepath);
	
if(isset($_FILES['webcam'])){	
	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
	$sql="INSERT INTO `photo`(`id_photo`, `photo`) 
	VALUES ('','$filename')";
	$result=mysqli_query($connection,$sql);
	echo $filepath.$filename;
}
?>
