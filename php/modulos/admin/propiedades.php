<?php
session_start();
$rol=$_SESSION['rol'];
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
        <div class="tarjetapropiedad">
            <div class="card">
                <a href="#" class="imagen">
                    <img src="../../../img/casa.png">
                    <div class="precio d-flex position-absolute">
                        <h3>$100,000 MXN</h3>
                        <span>Venta</span>
                    </div>
                </a>
                <div class="contenido">
                    <a href="#">Real Las Quintas</a>
                    <p class="fw-bold"><i class="fa-solid fa-map-location-dot"></i> Direccion</p>
                    <hr class="sidebar-divider">
                    <div class="d-flex justify-content-around">
                        <div><span>2</span><i class="fa-solid fa-shower"></i></div>
                        <div><i class="fas fa-vector-square"></i><span></span>m<sup>2</sup></div>
                        <div><span>2</span><i class="fas fa-bed"></i></sup></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../../../templates/footer.php';
?>