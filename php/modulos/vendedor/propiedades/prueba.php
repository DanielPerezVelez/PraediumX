<?php
session_start();

require "../../../../php/conexion.php";
$conexion= conectarDB();

$image="";
$description=$_POST['description'];
date_default_timezone_set('Europe/Madrid');
$date=date('Y-m-d H:i:s');

$countfiles=count($_FILES['files']['name']);

//Array para guardar los nombres en la base de datos

$images=array();

if($countfiles>0){
  for($i = 0; $i < $countfiles; $i++){
    $fileTmpPath = $_FILES['files']['tmp_name'][$i];
    $fileName = $_FILES['files']['name'][$i];
    $fileType = $_FILES['files']['type'][$i];
    $fileNameCmps = explode(".",$fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time().$fileName).".".$fileExtension;
    $image = $newFileName; 
    
    $allowedFileExtensions= array('png','jpg','jpeg');

    if(in_array($fileExtension,$allowedFileExtensions)){
      //directorios donde guardamos la imagen
      $uploadFileDir = '../../../../img/';
      $dest_path = $uploadFileDir.$newFileName;

      //comprimimos la imagen
      $calidad =40;
      $originalImage="";
      if($fileExtension=='png'){
        $originalImage = imagecreatefrompng($fileTmpPath);
      }else{
        $originalImage = imagecreatefromjpeg($fileTmpPath);
      }

      if(imagejpeg($originalImage,$dest_path,$calidad)){
        array_push($images,$image); 
      }
    }
  }
  $imagesList = implode(",",$images);

  $sql="INSERT INTO prueba (images,descriptionn,date) VALUES ('$imagesList', '$description', '$date')";
  $stmt= mysqli_query($conexion,$sql);


}
?>

