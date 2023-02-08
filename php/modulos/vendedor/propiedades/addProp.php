<?php session_start();
require_once("../../../conexion.php");
require_once("../../../funciones.php");
$conexion = conectarDB();
//INPUTS pasados a variables
$tipin = clean($_POST['select-tipin']);
$titulo = clean($_POST['input-titulo']);
$descripcion = clean($_POST['input-descripcion']);
$precio = clean($_POST['input-precio']);
$tipop = clean($_POST['select-tipop']);
$recamaras = clean($_POST['input-recamaras']);
$baños = clean($_POST['input-baños']);
$medbañ = clean($_POST['input-medbañ']);
$estacionamientos = clean($_POST['input-estacionamientos']);
$construccion = clean($_POST['input-construccion']);
$terreno = clean($_POST['input-terreno']);
$pisos = clean($_POST['input-pisos']);
$pais = clean($_POST['select-pais']);
$estado = clean($_POST['select-estado']);
$ciudad = clean($_POST['input-ciudad']);
$direccion = clean($_POST['input-direccion']);
//CHECKBOX pasados a variables
$playa = clean($_POST['input-playa']);
$balcon = clean($_POST['input-balcon']);
$cisterna = clean($_POST['input-cisterna']);
$roof = clean($_POST['input-roof']);
$easypark = clean($_POST['input-easypark']);
$playafrente = clean($_POST['input-playafrente']);
$aguafrente = clean($_POST['input-aguafrente']);
$garaje = clean($_POST['input-garaje']);
$jardin = clean($_POST['input-jardin']);
$parrilla = clean($_POST['input-parrilla']);
$patio = clean($_POST['input-patio']);
$aspersion = clean($_POST['input-aspersion']);
$roofgarden = clean($_POST['input-roofgarden']);
$terraza = clean($_POST['input-terraza']);
$vistagua = clean($_POST['input-vistagua']);
$vistamar = clean($_POST['input-vistamar']);

$i18 = clean($_POST['input-18']);
$discapacitados = clean($_POST['input-discapacitados']);
$aa = clean($_POST['input-aa']);
$alarma = clean($_POST['input-alarma']);
$amueblado = clean($_POST['input-amueblado']);
$bodega = clean($_POST['input-bodega']);
$calefaccion = clean($_POST['input-calefaccion']);
$chimenea = clean($_POST['input-chimenea']);
$circuito = clean($_POST['input-circuito']);
$cocina = clean($_POST['input-cocina']);
$cocinaequipada = clean($_POST['input-cocinaequipada']);
$conmutador = clean($_POST['input-conmutador']);
$roomservice = clean($_POST['input-roomservice']);
$plantas2 = clean($_POST['input-2plantas']);
$elevador = clean($_POST['input-elevador']);
$fraccpriv = clean($_POST['input-fraccpriv']);
$hidroneum = clean($_POST['input-hidroneum']);
$penthouse = clean($_POST['input-penthouse']);
$plantabaja = clean($_POST['input-plantabaja']);
$plantaelectrica = clean($_POST['input-plantaelectrica']);
$portero = clean($_POST['input-portero']);
$seguridad = clean($_POST['input-seguridad']);
$unaplanta = clean($_POST['input-unaplanta']);

$mascotas = clean($_POST['input-mascotas']);
$fumar = clean($_POST['input-fumar']);

$alberca = clean($_POST['input-alberca']);
$niños = clean($_POST['input-niños']);
$teniscancha = clean($_POST['input-teniscancha']);
$gimnasio = clean($_POST['input-gimnasio']);
$jacuzzi = clean($_POST['input-jacuzzi']);
$usos = clean($_POST['input-usos']);

$idcliente = $_SESSION['idcliente'];
//Subida de fotos
if (isset($_POST['guardar'])) {
  $image = "";

  // Inicio del proceso de addProp.php

  //Query de INSERT propiedad
  $queryProp = "INSERT INTO inmueble(titulo,descripcion,precio,recamaras,
                baños,medios_baños,estacionamientos,construccion,terreno,
                numero_pisos,idpais,idestado,ciudad,direccion,idcliente,
                idop,idtipin) 
                VALUES
                ('$titulo','$descripcion','$precio','$recamaras','$baños','$medbañ',
                '$estacionamientos','$construccion','$terreno','$pisos',
                '$pais','$estado','$ciudad','$direccion','$idcliente','$tipop','$tipin')";

  $resultadoProp = mysqli_query($conexion, $queryProp);

  //Query de SELECT inmueble
  $querySelectInmueble = "SELECT * FROM inmueble WHERE idcliente='$idcliente' ";
  $resultadoSelectInmueble = mysqli_query($conexion, $querySelectInmueble);

  if (mysqli_num_rows($resultadoSelectInmueble) > 0) {
    while ($row = mysqli_fetch_array($resultadoSelectInmueble)) {
      $idinm = $row['idinm'];
    }
  }

  //Query de INSERT serv exteriores
  $queryInsertSE = "INSERT INTO servext(playa,balcon,cisterna,roof,easypark,playafrente,aguafrente,garaje,
                jardin,parrilla,patio,aspersion,roofgarden,terraza,vistagua,vistamar,idinm)
                VALUES
                ('$playa','$balcon','$cisterna','$roof','$easypark','$playafrente','$aguafrente','$garaje','$jardin',
                '$parrilla','$patio','$aspersion','$roofgarden','$terraza','$vistagua','$vistamar','$idinm')";
  mysqli_query($conexion, $queryInsertSE);

  //Query de INSERT serv generales
  $queryInsertSG = "INSERT INTO servgen(i18,discapacitados,aa,alarma,amueblado,bodega,calefaccion,chimenea,
                circuito,cocina,cocinaequipada,conmutador,roomservice,plantas2,elevador,fraccpriv,hidroneum,penthouse,
                plantabaja,plantaelectrica,portero,seguridad,unaplanta,idinm)
                VALUES
                ('$i18','$discapacitados','$aa','$alarma','$amueblado','$bodega','$calefaccion','$chimenea','$circuito',
                '$cocina','$cocinaequipada','$conmutador','$roomservice','$plantas2','$elevador','$fraccpriv','$hidroneum',
                '$penthouse','$plantabaja','$plantaelectrica','$portero','$seguridad','$unaplanta','$idinm')";
  mysqli_query($conexion, $queryInsertSG);

  //Query de INSERT serv recrea
  $queryInsertSR = "INSERT INTO servrecrea(alberca,niños,teniscancha,gimnasio,jacuzzi,usos,idinm)
                VALUES
                ('$alberca','$niños','$teniscancha','$gimnasio','$jacuzzi','$usos','$idinm')";
  mysqli_query($conexion, $queryInsertSR);

  //Query de INSERT restricciones
  $queryInsertRest = "INSERT INTO restricciones(mascotas,fumar,idinm)
                VALUES
                ('$mascotas','$fumar','$idinm')";
  mysqli_query($conexion, $queryInsertRest);

  //Inicio de proceso de subida de múltiples fotos
  $countfiles = count($_FILES['input-file']['name']);
  
  //Array para guardar los nombres en la base de datos
  $images = array();

  if ($countfiles > 0) {
    for ($i = 0; $i < $countfiles; $i++) {
      $fileTmpPath = $_FILES['input-file']['tmp_name'][$i];
      $fileName = $_FILES['input-file']['name'][$i];
      $fileType = $_FILES['input-file']['type'][$i];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));
      $randomize = rand('11111111', '99999999');
      $preName = "galery" . $randomize . $idinm;
      $newFileName = $preName . "." . $fileExtension;
      $image = $newFileName;

      $allowedFileExtensions = array('png', 'jpg', 'jpeg');

      if (in_array($fileExtension, $allowedFileExtensions)) {
        //directorios donde guardamos la imagen
        $uploadFileDir = '../../../../img/casasIMG/';
        $dest_path = $uploadFileDir . $newFileName;

        //comprimimos la imagen
        $calidad = 40;
        $originalImage = "";
        if ($fileExtension == 'png') {
          $originalImage = imagecreatefrompng($fileTmpPath);
        } else {
          $originalImage = imagecreatefromjpeg($fileTmpPath);
        }

        if (imagejpeg($originalImage, $dest_path, $calidad)) {
          array_push($images, $image);
        }
      }
    }
    $imagesList = implode(",", $images);
    
    //Query de INSERT fotos para galería
    $sqll = "INSERT INTO fotosProp (imagen,idinm) VALUES ('$imagesList','$idinm')";
    $stmt = mysqli_query($conexion, $sqll);

  }
  header("location: miPropiedades2.php");
  //Final del proceso de addProp.php
}
//VALIDACIONES
    // $_FILES['input-file1'];
    // $img_name1=$_FILES['input-file1']['name'];
    // $img_size1=$_FILES['input-file1']['size'];
    // $tmp_name1=$_FILES['input-file1']['tmp_name'];
    // $error1=$_FILES['input-file1']['error'];
  
    // $image_info = getimagesize($tmp_name1);
    // $image_width = $image_info[0];
    // $image_height = $image_info[1];
    //Subiendo foto de la publicación del inmueble
    // if ($error1===0){
        // if ($img_size1 > 1400000){
        //     $em="It's too big!";
        //     header("Location: añadirProp.php?error=$em");
        // }else{
            // if($image_width<=2000 && $image_height<=1300){