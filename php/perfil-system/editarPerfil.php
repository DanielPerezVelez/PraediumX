<?php session_start();
require_once("../conexion.php");
require_once("../funciones.php");
//Para que se apliquen los cambios de $_SESSION se debe DESTRUIR LA SESION ACTUAL
$idcliente=$_SESSION['idcliente'];
$correoCliente=$_SESSION['usermail'];
$nombreCliente=$_SESSION['nombres'];
$apellidosCliente=$_SESSION['apellidos'];
$aboutme=$_SESSION['aboutme'];
$cdr=$_SESSION['ciudadresi'];
$cdo=$_SESSION['ciudadorigen'];
$profilePic=$_SESSION['profilepic'];

$conexion= conectarDB();

if(!isset($_SESSION['usermail'])){
    sleep(1);
    header("location: ../login-system/loginScreen.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="../../css/estilos-edit-perfil.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body id="page">
    <form action="updateProfile.php" method="POST" enctype="multipart/form-data">
        <div id="wrapper" class="div-wrapper"> 
            <div id="top-wrapper" class="divtop-wrapper">
                <div class="div-backhome">
                    <a class="a-btnhome" href="../../index.php" role="button">
                        PRAEDIUM
                    </a>             
                </div>
                <div class="div-logout">
                    <a class="a-logout" href="../login-system/logoutClient.php" role="button">
                        Salir
                    </a>
                </div>
            </div>

            <div id="content-wrapper" class="divcontent-wrapper">
                <div id="pics-conf" class="divpics-conf">
                    <div id="formProPic" class="formProPic" >
                        <div class="profile-pic">
                            <img src="../../img/<?php echo $profilePic;?>" width=280 height=280/>
                        </div>
                        <div class="pic-change">
                            <input type="file" name="uploadImage" id="uploadImage" accept=".jpg, .jpeg, .png" value="a">
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="form-update">
                    <div id="info-conf" class="divinfo-conf">
                        <div class="div-h1info">
                            <h1>Información de perfil</h1>
                        </div>
                        <div class="div-info">
                            <div class="div-form-info">
                                <a class="a-nombre">Nombre(s):</a>
                                <input required name="nombres" placeholder="<?php echo "$nombreCliente";?>" maxlength="80"></input>
                                <br>
                                <a class="a-apellido">Apellido(s):</a>
                                <input required name="apellidos" placeholder="<?php echo "$apellidosCliente";?>" maxlength="100"></input>
                                <br>
                                <div>
                                    <a class="a-nac">Nacionalidad:</a>
                                    <br>
                                    <select class ="select-nac" name= "select-nac">
                                        <?php
                                            //Creacion de conexion
                                            $sql='SELECT * FROM nacionalidades';
                                            $query=mysqli_query($conexion,$sql);       
                                            while($row=mysqli_fetch_array($query)){
                                                $idnacionalidad=$row['idnacionalidad'];
                                                $nacionalidad=$row['nacionalidad'];
                                        ?>
                                    <option value="<?php echo $idnacionalidad ?>"><?php echo $nacionalidad?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="div-form-aboutme">
                                <h1>Acerca de mi</h1>
                                <br>
                                <textarea required name="aboutme" class="txtarea-aboutme" placeholder="<?php
                                    if($_SESSION['aboutme']==''){
                                        echo "Escribe algo sobre ti...";
                                    }else{
                                        echo "$aboutme";
                                    }
                                ?>" maxlength="245"></textarea>
                            </div>    
                        </div>
                    </div>
                    <div id="edit-conf" class="divedit-conf">
                        <button type="submit" name="submit"> Guardar cambios </button>
                        <div class="div-infoad">
                            <br>
                            <h4>Ciudad de origen</h4>
                            <input required name="cdo" maxlength="100" placeholder="<?php
                                if($_SESSION['ciudadorigen']==''){
                                    echo "No especificado";
                                }else{
                                    echo "$cdo";
                                }
                            ?>">
                            </input>
                            <br><br>
                            <h4>Sexo</h4>
                            <select class ="select-sexo" name= "select-sexo">
                                <?php
                                //Creacion de conexion
                                    $sql='SELECT * FROM sexos';
                                    $query=mysqli_query($conexion,$sql);       
                                    while($row=mysqli_fetch_array($query)){
                                        $idsexo=$row['idsexo'];
                                        $sexo=$row['sexo'];
                                ?>
                                <option value="<?php echo $idsexo ?>"><?php echo $sexo?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <br><br><br>
                            <h4>Año de nacimiento</h4>
                            <select class ="select-adn" name= "select-adn">
                                <?php
                                //Creacion de conexion
                                    $sql='SELECT * FROM anios';
                                    $query=mysqli_query($conexion,$sql);       
                                    while($row=mysqli_fetch_array($query)){
                                        $idanio=$row['idanio'];
                                        $anio=$row['anio'];
                                ?>
                                <option value="<?php echo $idanio ?>"><?php echo $anio?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <br><br>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </form>
</body>
</html>

