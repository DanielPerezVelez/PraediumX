<?php session_start();
require_once("../conexion.php");
require_once("../funciones.php");
$conexion= conectarDB();

$idcliente=$_SESSION['idcliente'];
$nombres= clean($_POST ['nombres']);
$apellidos= clean($_POST ['apellidos']);
$aboutme= clean($_POST ['aboutme']);
$cdo= clean($_POST ['cdo']);
$nacionalidad= clean($_POST ['select-nac']);
$sexo= clean($_POST ['select-sexo']);
$adn= clean($_POST ['select-adn']);

$query="UPDATE cliente SET nombres='$nombres', apellidos='$apellidos', aboutme='$aboutme', idnacionalidad='$nacionalidad',
ciudadorigen='$cdo', idsexo='$sexo', idanio='$adn' WHERE idcliente='$idcliente'";
$resultado = mysqli_query($conexion,$query);

$_SESSION['nombres']=$nombres;
$_SESSION['apellidos']=$apellidos;
$_SESSION['aboutme']=$aboutme;
$_SESSION['ciudadorigen']=$cdo;
$_SESSION['sexo']=$sexo;
$_SESSION['anionac']=$adn;
$_SESSION['nacionalidad']=$nacionalidad;
sleep(1);
header("location: perfil.php");
//FIN DE ACTUALIZAR DATOS
//INICIO DE ACTUALIZAR FOTO DE PERFIL
if (isset($_POST['submit']) && isset($_FILES['uploadImage'])){
    $_FILES['uploadImage'];
    
    $img_name=$_FILES['uploadImage']['name'];
    $img_size=$_FILES['uploadImage']['size'];
    $tmp_name=$_FILES['uploadImage']['tmp_name'];
    $error=$_FILES['uploadImage']['error'];

    if ($error===0){
        if ($img_size > 1400000){
            $em="It's too big!";
            header("Location: perfil.php?error=$em");
        }else{
            $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);

            $allowed_exs=array("jpg","jpeg", "png");
            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name=uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path='../../img/perfilIMG/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);
                //actualizar la columna profilepic de la base de datos
                $_SESSION['profilepic']=$new_img_name;
                  
                $query="UPDATE cliente SET profilepic='$new_img_name' WHERE idcliente='$idcliente' ";
                mysqli_query($conexion,$query);         
            }else{
                $em="Not valid file type!";
                header("Location: perfil.php?error=$em");
            }
        }
    }else{
        $em="unknown error ocurred!";
        header("Location: perfil.php?error=$em");
    }
}else{
    header("Location: ../index1.php");
}