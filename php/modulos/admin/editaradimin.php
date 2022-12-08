<?php
session_start();
$rol = $_SESSION['rol'];
include '../../conexion.php';
include '../../../templates/headerAdmin.php';
include '../../crud.php';
?>

<?php
$idcliente = $_SESSION['idcliente'];
$correoCliente = $_SESSION['usermail'];
$nombreCliente = $_SESSION['nombres'];
$apellidosCliente = $_SESSION['apellidos'];
$aboutme = $_SESSION['aboutme'];
$cdr = $_SESSION['ciudadresi'];
$cdo = $_SESSION['ciudadorigen'];
$profilePic = $_SESSION['profilepic'];

$conexion = conectarDB();

if (!isset($_SESSION['usermail'])) {
    sleep(1);
    header("location: ../login-system/loginScreen.php");
}
?>
<form action="updateProfile.php" method="POST" enctype="multipart/form-data">

    <div class="editar-Perfil d-flex">
        <div>
            <div class=" d-flex justify-content-center flex-column flex-grow">
                <div class="box">
                    <img src="../../../img/perfilIMG/<?php echo $profilePic; ?>" width=280 height=280 />
                </div>
                <button class="adjuntar-archivo">
                    <label for="uploadImage"> <i class="fa-solid fa-image me"></i>Adjuntar Imagen</label>
                    <input type="file" name="uploadImage" id="uploadImage" accept=".jpg, .jpeg, .png" value="a">
                </button>
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
                        <input class="form-control" required name="nombres" placeholder="<?php echo "$nombreCliente"; ?>" maxlength="80"></input>

                        <h5 class="mt-2">Apellido(s):</h5>
                        <input class="form-control" required name="apellidos" placeholder="<?php echo "$apellidosCliente"; ?>" maxlength="100"></input>

                        <div>
                            <h5 class="mt-2">Nacionalidad:</h5>
                            <select class="form-control" name="select-nac">
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
                        <h5 class="mt-2">Acerca de mi</h5>
                        <textarea class="form-control" required name="aboutme" class="txtarea-aboutme" placeholder="
                        <?php
                        if ($_SESSION['aboutme'] == '') {
                            echo "Escribe algo sobre ti...";
                        } else {
                            echo "$aboutme";
                        }
                        ?>" maxlength="245">
                        </textarea>
                    </div>
                    <div class="div-infoad">

                        <h5 class="mt-2">Ciudad de origen</h5>
                        <input class="form-control" required name="cdo" maxlength="100" placeholder="<?php
                        
                                                                                if ($_SESSION['ciudadorigen'] == '') {
                                                                                    echo "No especificado";
                                                                                } else {
                                                                                    echo "$cdo";
                                                                                }
                                                                                ?>">
                        </input>
                        <h5 class="mt-2">Sexo</h5>
                        <select class="form-control" name="select-sexo">
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
include '../../../templates/footer.php';
?>