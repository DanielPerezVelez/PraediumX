<?php session_start();
require_once("../../conexion.php");
require_once("../../funciones.php");
$conexion= conectarDB();
//INPUTS pasados a variables
$tipin= clean($_POST ['select-tipin']);
$titulo= clean($_POST ['input-titulo']);
$descripcion= clean($_POST ['input-descripcion']);
$precio= clean($_POST ['input-precio']);
$tipop= clean($_POST ['select-tipop']);
$recamaras= clean($_POST ['input-recamaras']);
$baños= clean($_POST ['input-baños']);
$medbañ= clean($_POST ['input-medbañ']);
$estacionamientos= clean($_POST ['input-estacionamientos']);
$construccion= clean($_POST ['input-construccion']);
$terreno= clean($_POST ['input-terreno']);
$largter= clean($_POST ['input-largter']);
$anchoter= clean($_POST ['input-anchoter']);
$anio= clean($_POST ['input-anio']);
$pisoubi= clean($_POST ['input-pisoubi']);
$pisos= clean($_POST ['input-pisos']);
$clave= clean($_POST ['input-clave']);
$codigo= clean($_POST ['input-codigo']);
$calle= clean($_POST ['input-calle']);
$esquina= clean($_POST ['input-esquina']);
$cp= clean($_POST ['input-cp']);
//CHECKBOX pasados a variables
// $playa=clean($_POST['input-playa']);
$idcliente=$_SESSION['idcliente'];
//Subida de fotos
if (isset($_POST['guardar'])){

    // $_FILES['input-file'];
    $img_name=$_FILES['input-file']['name'];
    $img_size=$_FILES['input-file']['size'];
    $tmp_name=$_FILES['input-file']['tmp_name'];
    $error=$_FILES['input-file']['error'];

    if ($error==0){
        if ($img_size > 1400000){
            $em="It's too big!";
            header("Location: añadirProp.php?error=$em");
        }else{

            //Query de INSERT propiedad
            $queryProp= "INSERT INTO inmueble(titulo,descripcion,precio,recamaras,
            baños,medios_baños,estacionamientos,construccion,terreno,largoter,anchoter,añoconst,
            numero_pisos,piso_ubicacion,clave,codigo,calle,esquina,cp,idcliente,idop,idtipin) 
            VALUES
            ('$titulo','$descripcion','$precio','$recamaras','$baños','$medbañ',
            '$estacionamientos','$construccion','$terreno','$largter','$anchoter','$anio','$pisos',
            '$pisoubi','$clave','$codigo','$calle','$esquina','$cp','$idcliente','$tipop','$tipin')";
                
            $resultadoProp = mysqli_query($conexion,$queryProp);  
            //Query de SELECT inmueble
            $querySelectInmueble="SELECT * FROM inmueble WHERE idcliente='$idcliente' ";
            $resultadoSelectInmueble=mysqli_query($conexion,$querySelectInmueble);

            if(mysqli_num_rows($resultadoSelectInmueble) > 0){
                while($row=mysqli_fetch_array($resultadoSelectInmueble)){
                    $_SESSION['idinm']=$row['idinm'];
                    $idinm=$_SESSION['idinm'];
                }
            }
            //Query de INSERT foto
            foreach($img_name as $key=>$val){
                $rand=rand('11111111','99999999');
                $file_name=$rand.'_'.$val;
                $img_upload_path='../../../img/casasIMG/'.$file_name;
                // move_uploaded_file($tmp_name[$key],$img_upload_path);
                echo $file_name;
                $queryInsertarFoto="INSERT INTO fotosProp (imagen,idinm) VALUES ('$file_name','$idinm')";
                mysqli_query($conexion,$queryInsertarFoto);
                
             
            }
        }
    }else{
        $em="unknown error ocurred!";
        header("Location: añadirProp.php?error=$em");
    }
}else{
    header("Location: subir.php");
}
//form data <------ mas de 1 foto