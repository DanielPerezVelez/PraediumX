<?php
session_start();
$rol = $_SESSION['rol'];
include '../../conexion.php';
include '../../../templates/headerAdmin.php';
include '../../crud.php';
?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">USUARIOS</h1>
        <Button class="btn btn-info my-3"><i class="fa-solid fa-user-plus"></i> Agregar</Button>
    </div>
    <hr class="sidebar-divider">
    <div class="d-flex justify-content-center px-3">
        <select name="estado" id="estado" class="form-control col-4 mx-2">
            <option value="" disabled selected>--Tipo de Usuario--</option>
            <?php
            $roles = mysqli_query($conexion, "SELECT * FROM rolclt");
            while ($nombre = mysqli_fetch_assoc($roles)) { ?>
                <option value="<?php echo $nombre['idrolclt']; ?>"><?php echo $nombre['nombre']; ?></option>
            <?php } ?>
        </select>
        <input id="buscar" name="buscar" class=" mx-2 form-control col-6" type="buscar" placeholder="Buscar" value="">
        <button class="mx-2 form-control btn btn-info ms-5 col-2" type="submit">Buscar</button>
    </div>
    <div class=" container contenedor-usuarios py-5">
        <div class="carta mb-5">
            <div class="box">
                <img src="../../../img/foto.jpg" alt="">
            </div>

            <h4>Ana Paola</h4>
            <small>Cliente Vendedor</small>
        </div>
        <div class="carta mb-5">
            <div class="box">
                <img src="../../../img/person2.jpg" alt="">
            </div>

            <h4>Sarah Gonzales</h4>
            <small>Asesor</small>
        </div>
        <div class="carta mb-5">
            <div class="box">
                <img src="../../../img/person1.jpg" alt="">
            </div>

            <h4>Raul Jimenez</h4>
            <small>Administrador</small>
        </div>
        <div class="carta mb-5">
            <div class="box">
                <img src="../../../img/person1.jpg" alt="">
            </div>

            <h4>Raul Jimenez</h4>
            <small>Administrador</small>
        </div>
        <div class="carta mb-5">
            <div class="box">
                <img src="../../../img/person1.jpg" alt="">
            </div>

            <h4>Raul Jimenez</h4>
            <small>Administrador</small>
        </div>
        <div class="carta mb-5">
            <div class="box">
                <img src="../../../img/person1.jpg" alt="">
            </div>

            <h4>Raul Jimenez</h4>
            <small>Administrador</small>
        </div>
        <div class="carta mb-5">
            <div class="box">
                <img src="../../../img/person1.jpg" alt="">
            </div>

            <h4>Raul Jimenez</h4>
            <small>Administrador</small>
        </div>

    </div>
</div>

<?php
include '../../../templates/footer.php';
?>