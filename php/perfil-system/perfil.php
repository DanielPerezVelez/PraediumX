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
$sexo=$_SESSION['sexo'];
$adn=$_SESSION['anionac'];
$rol=$_SESSION['rol'];
$nacionalidad=$_SESSION['nacionalidad'];
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
    <link href="../../css/estilos-perfil.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/d7ac822b84.js" crossorigin="anonymous"></script>
</head>

<body id="page">
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
        <div class="divmid-wrapper">
            <div class="divgris-wrapper">
                <div id="pics-conf" class="div-profile-pic">
                    <div class="profile-pic">
                        <img src="../../img/perfilIMG/<?php echo $profilePic;?>" width=200 height=200/>
                    </div>
                </div>
                <div class="div-profile-info"> 
                    <div class="div-name">
                        <a><?php echo "$nombreCliente $apellidosCliente"; ?></a>
                    </div>
                    <div class="div-rol">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <a>
                            <?php
                                if($rol==3){
                                    echo "Comprador";
                                }else{
                                    if($rol==4){
                                        echo "Propietario";
                                    }
                                }
                            ?>
                        </a>
                    </div>
                    <div class="div-nacionalidad">
                        <i class="fa-solid fa-earth-americas"></i>
                        <?php
                            if($_SESSION['nacionalidad']==''){
                        ?>
                        <a><?php
                                echo "No especificado";
                            }else{     
                        ?></a>
                        <?php
                            $query="SELECT nacionalidades.nacionalidad
                            FROM cliente INNER JOIN nacionalidades
                            ON cliente.idnacionalidad = nacionalidades.idnacionalidad WHERE idcliente='$idcliente'";

                            $resultado = mysqli_query($conexion,$query);
                            while ($row = $resultado->fetch_assoc()) {
                        ?>
                        <a> <?php echo $row['nacionalidad'];?> </a>
                        <?php
                            }
                        }
                        ?>
                    </div>   
                </div>
            </div>
        </div>
        <div id="content-wrapper" class="divcontent-wrapper">
            <div id="info-conf" class="divinfo">
                <div class="div-info">
                    <div class="div-form-aboutme">
                        <i class="fa-solid fa-user"></i>
                        <a class="acerca-demi">Acerca de mi</a>
                        <br><br>
                        <p class="textarea-aboutme">
                            <?php
                                if($_SESSION['aboutme']==''){
                                    echo "Escribe algo sobre ti...";
                                }else{
                                    echo "$aboutme";
                                }
                            ?>
                        </p>
                        <br>
                        <i class="fa-solid fa-venus-mars"></i>
                        <a class="acerca-demi">Sexo</a>
                        <br>
                        <a class="a-nac2">
                            <?php
                                if($_SESSION['sexo']==''){
                            ?>
                            <a><?php
                                    echo "No especificado";
                                }     
                            ?></a>
                            <?php
                                $query="SELECT sexos.sexo
                                FROM cliente INNER JOIN sexos
                                ON cliente.idsexo = sexos.idsexo WHERE idcliente='$idcliente'";

                                $resultado = mysqli_query($conexion,$query);
                                while ($row = $resultado->fetch_assoc()) {
                            ?>
                            <a> <?php echo $row['sexo'];?> </a>
                            <?php
                                }
                            ?>
                        </a>
                        <br><br>
                    </div> 
                    <div class="div-infoad">
                        <br>
                        <i class="fa-solid fa-tree-city"></i>
                        <a class="acerca-2">Ciudad de origen</a>
                        <br><br>
                        <a class="a-nac2">
                            <?php
                                if($_SESSION['ciudadorigen']==''){
                                    echo "No especificado";
                                }else{
                                    echo "$cdo";
                                }
                            ?>
                        </a>
                        <br><br><br>
                        <i class="fa-solid fa-cake-candles"></i>
                        <a class="acerca-2">Año de nacimiento</a>
                        <br><br>
                        <a class="a-nac2">
                            <?php
                                if($_SESSION['sexo']==''){
                            ?>
                            <a><?php
                                     echo "No especificado";
                                }     
                            ?></a>
                            <?php
                                $query="SELECT anios.anio
                                FROM cliente INNER JOIN anios
                                ON cliente.idanio = anios.idanio WHERE idcliente='$idcliente'";

                                $resultado = mysqli_query($conexion,$query);
                                while ($row = $resultado->fetch_assoc()) {
                            ?>
                            <a><?php echo $row['anio'];?></a>
                            <?php
                                }
                            ?>
                        </a>
                    </div>      
                </div>
            </div>

            <div id="edit-conf" class="divedit-conf">
                <div class="div-hrefs">
                    <form action="editarPerfil.php" method="POST">
                        <br>
                        <button>Editar perfil.</button>
                        <br><br>
                    </form>
                    <form action="guardados.php" method="POST">
                        <button>Guardados</button>
                        <br><br>
                    </form>
                    <form action="interesantes.php" method="POST">
                        <button>Interesantes</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

