<?php
session_start();
$rol = $_SESSION['rol'];
include '../../../templates/headerAdmin.php';
include '../../crud.php';
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
        <div class="contenedor-propiedades">
            <?php while ($propiedad = $resultado2->fetch_assoc()) { ?>
                <div class="tarjetapropiedad">
                    <div class="card">
                        <a href="#" class="imagen">
                            <img src="../../../img/<?php echo $propiedad['imagen']; ?>">
                            <div class="precio d-flex position-absolute">
                                <h3> $<?php echo number_format($propiedad['precio']); ?> </h3>
                                <span><?php echo $propiedad['estado']; ?></span>
                            </div>
                        </a>
                        <div class="contenido">
                            <a href="#"><?php echo $propiedad['nombre']; ?></a>
                            <p class="fw-bold"><i class="fa-solid fa-map-location-dot"></i> <?php echo $propiedad['direccion']; ?></p>
                            <hr class="sidebar-divider">
                            <div class="contenedor-servicios d-flex justify-content-around">
                                <div><span><?php echo $propiedad['toilets']; ?></span><i class="fa-solid fa-shower"></i></div>
                                <div><i class="fas fa-vector-square"></i><span></span><?php echo $propiedad['medida']; ?>m<sup>2</sup></div>
                                <div><span><?php echo $propiedad['cuartos']; ?></span><i class="fas fa-bed padding-2"></i></sup></div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include '../../../templates/footer.php';
?>