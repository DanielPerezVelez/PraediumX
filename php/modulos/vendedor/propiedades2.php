<?php
session_start();
$rol=$_SESSION['rol'];
include '../../../templates/headerVendedor.php';
include '../../crud.php';
$idcliente=$_SESSION['idcliente'];
?>
<div class="container h-100">
    <h1>Propiedades</h1>
    <div>
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <div class="container">
                <div class="container-options">
                    <div id="seleted1" class="selected">
                        Estados
                        <i id="caret-down" class="ms-2 fa-solid fa-caret-down"></i>
                    </div>
                    <div class="select-box">
                        <div class="options-container">
                            <div class="option">
                                <input type="radio" class="radio" id="Benito Juarez" name="Estado" />
                                <label for="Benito Juarez">Benito Juarez</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" id="Tulum" name="Estado" />
                                <label for="Tulum">Tulum</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" id="Puerto Morelos" name="Estado" />
                                <label for="Benito Juarez">Puerto Morelos</label>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../../../js/animation.js"></script>
            </div>
            <div class="container">
                <div class="container-options">
                    <div id="seleted1" class="selected">
                        Estados
                        <i id="caret-down" class="ms-2 fa-solid fa-caret-down"></i>
                    </div>
                    <div class="select-box">
                        <div class="options-container">
                            <div class="option">
                                <input type="radio" class="radio" id="Benito Juarez" name="Estado" />
                                <label for="Benito Juarez">Renta</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" id="Benito Juarez" name="Estado" />
                                <label for="Benito Juarez">Compra</label>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../../../js/animation.js"></script>
            </div>


        </nav>
        <div>
            <?php
             if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
             if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
             $querySI="SELECT * FROM inmueble WHERE idcliente='$idcliente'";
             $articulos=mysqli_query($conexion,$querySI);
             $num_registros=@mysqli_num_rows($articulos);
             $registros= '2';
             $pagina=$_REQUEST["nume"];
             if (is_numeric($pagina))
             $inicio= (($pagina-1)*$registros);
             else
             $inicio=0;
             $querySILimit="SELECT * FROM inmueble WHERE idcliente='$idcliente' LIMIT $inicio,$registros";
             $busqueda=mysqli_query($conexion,$querySILimit);
             $paginas=ceil($num_registros/$registros);
            ?>
            <div class="contenedor-propiedades">
                <?php while ($propiedad = mysqli_fetch_assoc($busqueda)) {
                    $idInm=$propiedad['idinm'];
                    $a="SELECT * FROM fotosProp WHERE idinm='$idInm'";
                    $aa=mysqli_query($conexion,$a);
                    while($fotoProp=mysqli_fetch_assoc($aa)){
                        $imagenn=$fotoProp['imagen'];
                        echo $imagenn;
                    }
                ?>
                    <div class="tarjetapropiedad">
                        <div class="card">
                            <a href="#" class="imagen">
                                <img src="../../../img/casasIMG/<?php echo $imagenn;?>">
                                <div class="precio d-flex position-absolute">
                                    <h3> $<?php echo number_format($propiedad['precio']); ?> </h3>
                                    <span><?php echo $propiedad['idestado']; ?></span>
                                </div>
                            </a>
                            <div class="contenido">
                                <a href="#"><?php echo $propiedad['titulo']; ?></a>
                                <p class="fw-bold"><i class="fa-solid fa-map-location-dot"></i> <?php echo $propiedad['ciudad']; ?></p>
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
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='paginacion page-link' aria-label='Previous' href='propiedades2.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='propiedades2.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='propiedades2.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='propiedades2.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
        </div>
    </div>
</div>
<?php
include '../../../templates/footer.php';
?>