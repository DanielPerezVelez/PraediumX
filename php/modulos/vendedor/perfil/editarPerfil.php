<?php session_start();
require_once("../../../conexion.php");
require_once("../../../funciones.php");
include '../../../../templates/headerVendedor.php';
//Para que se apliquen los cambios de $_SESSION se debe DESTRUIR LA SESION ACTUAL
$idcliente=$_SESSION['idcliente'];
$correoCliente=$_SESSION['usermail'];
$nombreCliente=$_SESSION['nombres'];
$apellidosCliente=$_SESSION['apellidos'];
$aboutme=$_SESSION['aboutme'];
$cdr=$_SESSION['ciudadresi'];
$cdo=$_SESSION['ciudadorigen'];
$profilePic=$_SESSION['profilepic'];
$nacionalidadPerfil=$_SESSION['nacionalidad'];
$sexo=$_SESSION['sexo'];
$anioNac=$_SESSION['anionac'];

$conexion= conectarDB();

if(!isset($_SESSION['usermail'])){
    header("location: ../../../login-system/loginScreen.php");
}
?>

<form action="updateProfile.php" method="POST" enctype="multipart/form-data">

    <div class="editar-Perfil d-flex">
        <div>
            <div class=" d-flex justify-content-center flex-column flex-grow">
                <div class="editar-foto-perfil ">
                    <img src="../../../../img/perfilIMG/<?php echo $profilePic; ?>" width=280 height=280 />
                </div>
                <div class="adjuntar-archivo">
                    <label for="uploadImage"> <i class="fa-solid fa-image me"></i>Adjuntar Imagen</label>
                    <input type="file" name="uploadImage" id="uploadImage" accept=".jpg, .jpeg, .png" value="a">
                </div>
            </div>
        </div>
        <div class="contenedor-datos p-4">
            <div id="info-conf" class="divinfo-conf">
                <div class="div-h1info">
                    <h1>Información de perfil</h1>

                </div>
                <hr class="sidebar-divider">
                <div>
                    <div>
                        <h5 class="mt-2">Nombre(s):</h5>
                        <input class="form-control" required type="text" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1 ]+" name="nombres" value="<?php echo "$nombreCliente"; ?>" maxlength="80" minlength="2" title="Números no permitidos. Ingrese sólo letras.">

                        <h5 class="mt-2">Apellido(s):</h5>
                        <input class="form-control" required type="text" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1 ]+" name="apellidos" value="<?php echo "$apellidosCliente"; ?>" maxlength="100" minlength="2" title="Números no permitidos. Ingrese sólo letras.">

                        <div>
                            <h5 class="mt-2">Nacionalidad:</h5>
                            <select required class="form-control" name="select-nac">
                                <?php
                                //Creacion de conexion
                                    $sqlNac = "SELECT * FROM nacionalidades WHERE idnacionalidad='$nacionalidadPerfil'";
                                    $queryNac = mysqli_query($conexion, $sqlNac);
                                    while ($row = mysqli_fetch_array($queryNac)) {
                                        $nacionalidadPerfil = $row['nacionalidad'];
                                    }
                                ?>
                                <option value="" disabled selected><?php if ($nacionalidadPerfil == '') {
                                    echo "- - Seleccione su nacionalidad - -";
                                } else {
                                    echo $nacionalidadPerfil;
                                }?></option>
                                <?php
                                    //Creacion de conexion
                                    $sql = 'SELECT * FROM nacionalidades';
                                    $query = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $idnacionalidad = $row['idnacionalidad'];
                                        $nacionalidad = $row['nacionalidad'];
                                ?>
                                <option value="<?php echo $idnacionalidad ?>"><?php echo $nacionalidad ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <h5 class="mt-2">Acerca de mí</h5>
                        <textarea class="form-control" required type="text" pattern="^[a-zA-Z0-9À-ÿ\u00f1\u00d1\s]+" name="aboutme" maxlength="245" minlength="3" title="Ingrese sólo caracteres alfanuméricos."><?php echo $aboutme;?></textarea>
                    </div>
                    <div class="div-infoad">

                        <h5 class="mt-2">Ciudad de origen</h5>
                        <input class="form-control" required type="text" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1 ]+" name="cdo" maxlength="100" minlength="2" title="Números no permitidos. Ingrese sólo letras." value="<?php echo $cdo;?>">
                        <h5 class="mt-2">Sexo</h5>
                        <select class="form-control" name="select-sexo">
                            <?php
                                //Creacion de conexion
                                $sqlSex = "SELECT * FROM sexos WHERE idsexo='$sexo'";
                                $querySex = mysqli_query($conexion, $sqlSex);
                                while ($row = mysqli_fetch_array($querySex)) {
                                    $sexo = $row['sexo'];
                                }
                            ?>
                            <option value="" disabled selected><?php if ($sexo == '') {
                                echo "- - Seleccione su sexo - -";
                            } else {
                                echo $sexo;
                            }?></option>                            
                            <?php
                                //Creacion de conexion
                                $sql = 'SELECT * FROM sexos';
                                $query = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    $idsexo = $row['idsexo'];
                                    $sexo = $row['sexo'];
                            ?>
                                <option value="<?php echo $idsexo ?>"><?php echo $sexo ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <h5 class="mt-2">Año de nacimiento</h5>
                        <select class="form-control mb-4" name="select-adn">
                            <?php
                                //Creacion de conexion
                                $sqlAnio = "SELECT * FROM anios WHERE idanio='$anioNac'";
                                $queryAnio = mysqli_query($conexion, $sqlAnio);
                                while ($row = mysqli_fetch_array($queryAnio)) {
                                    $anioNac = $row['anio'];
                                }
                            ?>
                            <option value="" disabled selected><?php if ($anioNac == '') {
                                echo "- - Seleccione su año de nacimiento - -";
                            } else {
                                echo $anioNac;
                            }?></option>                            
                            <?php
                                //Creacion de conexion
                                $sql = 'SELECT * FROM anios';
                                $query = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    $idanio = $row['idanio'];
                                    $anio = $row['anio'];
                            ?>
                                <option value="<?php echo $idanio ?>"><?php echo $anio ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-info" type="submit" name="submit"> Guardar cambios </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include '../../../../templates/footer.php';
?>
