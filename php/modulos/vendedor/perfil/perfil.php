<?php session_start();
include '../../../../templates/headerVendedor.php';
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
?>
    <div id="wrapper" class="container d-flex my-3"> 
        <div>
            <div class="carta2">
                <div id="pics-conf" class="div-profile-pic">
                    <div class="perfil">
                        <img src="../../../../img/perfilIMG/<?php echo $profilePic;?>" width=200 height=200/>
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
            <div class="botones-perfil">
                <div id="edit-conf" class="divedit-conf">
                    <div class="d-flex flex-column align-content-center">
                        <form action="editarPerfil.php" method="POST">
                            <br>
                            <button class="d-block btn btn-info mb-2"><i class="fa-solid fa-pencil"></i>Editar perfil</button>
                            <br>
                        </form>
                        <form action="guardados.php" method="POST">
                            <button class="btn btn-info mb-2"><i class="fa-solid fa-floppy-disk"></i>Guardados</button>
                            <br><br>
                        </form>
                        <form action="interesantes.php" method="POST">
                            <button class="btn btn-info mb-2"><i class="fa-solid fa-star"></i>Interesantes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-wrapper" class="informacion-Perfil container">
            <div id="info-conf" class="divinfo">
                <div class="div-info">
                    <div class="div-form-aboutme">
                        <div class="mb-3">
                            <h2 class="text-info"><i class="fa-solid fa-user"></i> Acerca de mi</h2>
                            <p class="form-control border">
                                <?php
                                    if($_SESSION['aboutme']==''){
                                        echo "Escribe algo sobre ti...";
                                    }else{
                                        echo "$aboutme";
                                    }
                                ?>
                            </p>
                            <br>
                        </div>
                        <br>
                        <div class="mb-3">
                            <h5 class="text-info"><i class="fa-solid fa-venus-mars"></i> Sexo</h5>
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
                        </div>
                    </div> 
                    <div>
                        <br>
                        <div class="mb-3">
                            <h5 class="text-info"><i class="fa-solid fa-tree-city"></i> Ciudad de origen</h5>
                            <p>
                                <?php
                                    if($_SESSION['ciudadorigen']==''){
                                        echo "No especificado";
                                    }else{
                                        echo "$cdo";
                                    }
                                ?>
                            </p>
                        </div>
                        <br>
                        <div class="mb-3">
                            <h5 class="text-info"><i class="fa-solid fa-cake-candles"></i> Año de nacimiento</h5>
                            <p>
                                <?php
                                    if ($_SESSION['sexo'] == '') {
                                ?>
                                <p>
                                    <?php
                                            echo "No especificado";
                                        }
                                    ?>
                                </p>
                                <?php
                                    $query = "SELECT anios.anio
                                    FROM cliente INNER JOIN anios
                                    ON cliente.idanio = anios.idanio WHERE idcliente='$idcliente'";

                                    $resultado = mysqli_query($conexion, $query);
                                    while ($row = $resultado->fetch_assoc()) {
                                ?>
                                    <p><?php echo $row['anio']; ?></p>
                                <?php
                                }
                                ?>
                            </p>
                        </div>        
                    </div>      
                </div>
            </div>

        </div>
    </div>
<?php
include '../../../../templates/footer.php';
?>

