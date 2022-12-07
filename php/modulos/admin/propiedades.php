<?php
session_start();
$rol = $_SESSION['rol'];
include '../../conexion.php';
include '../../../templates/headerAdmin.php';
include '../../crud.php';
?>
<div class="container h-100">
    <h1>Propiedades</h1>
    <div>
        <form class="dropdowns mx-3">
            <div class="d-flex mx-2 my-2">
                <input id="buscar" name="buscar" class="form-control" type="buscar" placeholder="Buscar" value="">
            </div>
            <div class="mx-2">
                <label for="estado">Estados:</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="" disabled selected>--Elige un estado--</option>
                    <?php
                    $estados = mysqli_query($conexion, "SELECT * FROM estados");
                    while ($nombre = mysqli_fetch_assoc($estados)) { ?>
                        <option value="<?php echo $nombre['idestado']; ?>"><?php echo $nombre['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mx-2 my-2">
                <label for="operacion">Operacion:</label>
                <select name="operacion" id="operacion" class="form-control">
                    <option value="" disabled selected>--Elige una operacion--</option>
                    <?php
                    $disponibilidad = mysqli_query($conexion, "SELECT * FROM operacion");
                    while ($tipo = mysqli_fetch_assoc($disponibilidad)) { ?>
                        <option value="<?php echo $tipo['idop']; ?>"><?php echo $tipo['tipo']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mx-2 my-2">
                <label>Precio:</label>
                <div class="d-flex">
                    <input id="min" name="min" class="form-control mx-2" type="min" placeholder="Min:" aria-label="min">
                    <input id="max" name="max" class="form-control mx-2" type="max" placeholder="Max:" aria-label="max">
                </div>
            </div>
            <button class=" form-control btn btn-info ms-5" type="submit">Buscar</button>
        </form>
    </div>

    <div>
        <?php
        if (!empty($_REQUEST["nume"])) {
            $_REQUEST["nume"] = $_REQUEST["nume"];
        } else {
            $_REQUEST["nume"] = '1';
        }
        if ($_REQUEST["nume"] == "") {
            $_REQUEST["nume"] = "1";
        }

        $buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
        $estado = isset($_GET['estado']) ? $_GET['estado'] : '';
        $operacion = isset($_GET['operacion']) ? $_GET['operacion'] : '';
        $min = isset($_GET['min']) ? $_GET['min'] : '';
        $max = isset($_GET['max']) ? $_GET['max'] : '';

        if ($buscar) {
            $query = "SELECT * FROM inmueble WHERE titulo LIKE '%" . $buscar . "%'";
        } else if ($estado && $operacion) {
            $query = "SELECT * FROM inmueble WHERE idestado LIKE '%" . $estado . "%' AND idop =" . $operacion;
        } else {
            $query = "SELECT * FROM inmueble";
        }
        // if(isset($_GET['buscar']) && $_GET['buscar'] != ''){
        //     $query .= "titulo LIKE '%".$_GET['buscar']."%' ";
        // }

        // if(isset($_GET['estado']) && $_GET['estado'] != ''){
        //     if(isset($_GET['buscar']) && $_GET['buscar'] != ''){
        //         $query .= "AND idestado = ".$_GET['estado'];
        //     }else{
        //         $query .= "idestado = ".$_GET['estado'];
        //     }
        // }

        // if(isset($_GET['operacion']) && $_GET['operacion'] != ''){
        //     if(isset($_GET['buscar']) && $_GET['buscar'] != '' && isset($_GET['estado']) && $_GET['estado'] != ''){
        //         $query .= "AND idop = ".$_GET['operacion'];
        //     }else{
        //         $query .= "idestado = ".$_GET['operacion'];
        //     }
        // }


        $articulos = mysqli_query($conexion, $query);
        $num_registros = @mysqli_num_rows($articulos);
        $registros = '10';
        $pagina = $_REQUEST["nume"];
        if (is_numeric($pagina))
            $inicio = (($pagina - 1) * $registros);
        else
            $inicio = 0;
        $query = mysqli_query($conexion, $query .= " LIMIT $registros;");
        $paginas = ceil($num_registros / $registros);
        ?>
        <div class="contenedor-propiedades">
            <?php while ($propiedad = mysqli_fetch_assoc($articulos)) { ?>
                <div class="tarjetapropiedad">
                    <div class="card">
                        <a href="#" class="imagen">
                            <img src="../../../img/<?php echo $propiedad['imagen']; ?>">
                            <div class="precio d-flex position-absolute">
                                <h3> $<?php echo number_format($propiedad['precio']); ?> </h3>
                                <span><?php echo $propiedad['idop']; ?></span>
                            </div>
                        </a>
                        <div class="contenido">
                            <a href="#"><?php echo $propiedad['titulo']; ?></a>
                            <p class="fw-bold"><i class="fa-solid fa-map-location-dot"></i> <?php echo $propiedad['calle']; ?></p>
                            <hr class="sidebar-divider">
                            <div class="contenedor-servicios d-flex justify-content-around">
                                <div><span><?php echo $propiedad['toilet']; ?></span><i class="fa-solid fa-shower"></i></div>
                                <div><i class="fas fa-vector-square"></i><span></span><?php echo $propiedad['terreno']; ?>m<sup>2</sup></div>
                                <div><span><?php echo $propiedad['recamaras']; ?></span><i class="fas fa-bed padding-2"></i></sup></div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="container-fluid  col-12">
            <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">
                <li class="page-item">
                    <?php
                    if ($_REQUEST["nume"] == "1") {
                        $_REQUEST["nume"] == "0";
                        echo  "";
                    } else {
                        if ($pagina > 1)
                            $ant = $_REQUEST["nume"] - 1;
                        echo "<a class='paginacion page-link' aria-label='Previous' href='propiedades.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";
                        echo "<li class='page-item '><a class='page-link' href='propiedades.php?nume=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
                    }
                    echo "<li class='page-item active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></li>";
                    $sigui = $_REQUEST["nume"] + 1;
                    $ultima = $num_registros / $registros;
                    if ($ultima == $_REQUEST["nume"] + 1) {
                        $ultima == "";
                    }
                    if ($pagina < $paginas && $paginas > 1)
                        echo "<li class='page-item'><a class='page-link' href='propiedades.php?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
                    if ($pagina < $paginas && $paginas > 1)
                        echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='propiedades.php?nume=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
                    ?>
            </ul>
        </div>
    </div>
</div>
<?php
include '../../../templates/footer.php';
?>