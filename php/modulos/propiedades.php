<?php

include '../../templates/header.php';
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
                <script src="../js/animation.js"></script>
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
                <script src="../js/animation.js"></script>
            </div>
            

        </nav>
        <div class="tarjetapropiedad">
                <div class="card">
                    <picture>
                        <img src="/img/casa.jpg">
                    </picture>
                    <div class="contenido">
                        <h3><?php echo $a; ?></h3>
                        <p><?php  ?></p>
                        <p><?php  ?></p>
                        <p><?php ?><p>
                        <a href="#">Leer Más</a>                      
                    </div>
                </div>

            </div>
    </div>
</div>
<?php
include '../../templates/footer.php';
?>