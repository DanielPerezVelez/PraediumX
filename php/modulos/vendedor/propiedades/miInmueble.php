<?php
session_start();
$rol = $_SESSION['rol'];
include '../../../../templates/headerVendedor.php';
$idcliente = $_SESSION['idcliente'];
$idinm = $_GET['idinm'];
require "apiInmueble.php";
?>

<div class="d-flex">
    <div class="caja">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2>
                    <?php echo $titulo; ?>
                </h2>
                <div>
                    <a href="editarProp.php?idinm=<?php echo $idinm; ?>">
                        <Button class="btn btn-outline-info my-4"><i class="fa-solid fa-pencil"></i> Editar</Button>
                    </a>
                    <Button class="btn btn-outline-danger my-4"><i class="fa-solid fa-trash-can"></i></Button>
                </div>               
            </div>
            <div class="d-flex justify-content-center width='100%' height='100%'">
                <div>
                    <?php for ($i = 0; $i < count($posts); $i++) {
                        $imagesName = explode(",", $posts[$i]['imagen']); ?>

                        <div class="col">
                            <div class="carousel slide" id="carousel<?= $posts[$i]['id_fp'] ?>" data-bs-ride="false">
                                <div class="carousel-indicators">
                                    <?php for ($j = 0; $j < count($imagesName); $j++) {
                                        if ($j == 0) { ?>

                                            <button class="active" type="button" data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>"
                                                data-bs-slide-to="<?= $j ?>" aria-current="true"
                                                aria-label="Slide<?= $i ?>"></button>
                                        <?php } else { ?>
                                            <button class="" type="button" data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>"
                                                data-bs-slide-to="<?= $j ?>" aria-current="true"
                                                aria-label="Slide<?= $i ?>"></button>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                                <div class="image-container carousel-inner">
                                    <?php for ($j = 0; $j < count($imagesName); $j++) {
                                        if ($j == 0) { ?>
                                            <div class="carousel-item active"> <!-- Este es mi container-image-->
                                        <?php } else { ?>

                                            <div class="carousel-item">

                                        <?php } ?>

                                                <img class="image-carousel mx-auto w-100" height="400"
                                                    src="../../../../img/casasIMG/<?= $imagesName[$j] ?>">

                                            </div>
                                            <div class="popup-image">
                                                <span>&times;</span>
                                                <img src="" alt="">
                                            </div>
                                    <?php } ?>

                                    <?php if (count($imagesName) > 1) { ?>

                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>" data-bs-slide="prev"><span
                                                class="carousel-control-prev-icon" aria-hidden="true"></span><span
                                                class="visually-hidden">Previous</span></button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>" data-bs-slide="next"><span
                                                class="carousel-control-next-icon" aria-hidden="true"></span><span
                                                class="visually-hidden">Next</span></button>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="d-flex justify-content-left">
                <h3 class="p-3" style="color: #777777;">$
                    <?php echo number_format($precio); ?> MXN
                </h3>
                <div class="d-flex position-relative" style="display: flex; align-items: center;">
                    <h4 class="h4-operation">
                        <?php if ($idOp == 1) {
                            echo "En venta";
                        }
                        if ($idOp == 2) {
                            echo "Renta";
                        } ?>
                    </h4>
                </div>
            </div>
            <div class="caract-container d-flex justify-content-around">
                <p><i class="fas fa-bed padding-2"></i> Recámaras:
                    <?php echo $recamaras; ?>
                </p>
                <p><i class="fa-solid fa-shower"></i> Baños:
                    <?php echo $baños; ?>
                </p>
                <p><i class="fa-solid fa-toilet"></i> Medios baños:
                    <?php echo $medban; ?>
                </p>

            </div>
            <div class="caract-container d-flex justify-content-around">
                <p><i class="fa-solid fa-square-parking"></i> Estacionamientos:
                    <?php echo $estacionamientos; ?>
                </p>
                <p><i class="fa-solid fa-building-user"></i> Construcción:
                    <?php echo $construccion; ?>
                </p>
                <p><i class="fa-solid fa-stairs"></i> Número de pisos:
                    <?php echo $numpis; ?>
                </p>
            </div>
                <div class="caract-container d-flex justify-content-around">
                    <p><i class="fa-solid fa-tree-city"></i> Terreno:
                        <?php echo $terreno; ?> m2
                    </p>
                </div>
                <hr class="sidebar-divider" style="border: none; height: 1px; background-color: #929292;">
                <div class="caract-container d-flex justify-content-around">
                    <p><i class="fa-solid fa-earth-americas"></i> País:
                        <?php if ($idPais == 1) {
                            echo "México";
                        } ?>
                    </p>
                    <p><i class="fa-solid fa-location-dot"></i></i> Estado:
                        <?php echo $nombrestado; ?>
                    </p>
                    <p><i class="fa-solid fa-map-location-dot"></i> Ciudad:
                        <?php echo $ciudad; ?>
                    </p>
                </div>
                <hr class="sidebar-divider" style="border: none; height: 1px; background-color: #929292;">
                <div>
                    <h3 style="color: #2b91df;">DESCRIPCION</h3>
                    <p>
                        <?php echo $descripcion; ?>
                    </p>
                    <p>
                        <?php echo $direccion; ?>
                    </p>
                </div>
                <hr class="sidebar-divider" style="border: none; height: 1px; background-color: #929292;">
                <div class="amenidades-container">
                    <h3 style="color: #2b91df;">AMENIDADES</h3>
                    <br>
                    <h4 class="mb-2">Exterior</h4>
                    <div>
                        <?php
                        if ($sePlaya == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Acceso a Playa</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seBalcon == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Balcón</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seCisterna == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Cisterna</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seRoof == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Estacionamiento techado</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seEasypark == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Facilidad para estacionarse</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sePlayafrente == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Frente a la playa</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seAguafrente == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Frente al agua</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seGaraje == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Garaje</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seJardin == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Jardín</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seParrilla == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Parrilla</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sePatio == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Patio</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seAspersion == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Riego por aspersión</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seRoofgarden == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Jardín en el techo</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seTerraza == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Terraza</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seVistagua == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Vista al agua</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($seVistamar == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Vista al mar</p>
                            <?php
                        }
                        ?>
                    </div>
                    <br>
                    <h4 class="mb-2">General</h4>
                    <div>
                        <?php
                        if ($sgI18 == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Accesibilidad para adultos mayores</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgDiscapacitados == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Accesibilidad para personas con discapacidad</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgAa == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Aire acondicionado</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgAlarma == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Alarma</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgAmueblado == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Amueblado</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgBodega == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Bodega</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgCalefaccion == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Calefacción</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgChimenea == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Chimenea</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgCircuito == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Circuito cerrado</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgCocina == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Cocina</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgCocinaequipada == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Cocina equipada</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgConmutador == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Conmutador</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgRoomservice == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Cuarto de servicio</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgPlantas2 == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Dos plantas</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgElevador == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Elevador</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgFraccpriv == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Fraccionamiento privado</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgHidroneum == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Hidroneumático</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgPenthouse == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Penthouse</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgPlantabaja == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Planta baja</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgPlantaelectrica == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Planta eléctrica</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgPortero == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Portero</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgSeguridad == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Seguridad</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($sgUnaplanta == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Una sola planta</p>
                            <?php
                        }
                        ?>
                    </div>
                    <br>
                    <h4 class="mb-2">Políticas</h4>
                    <div>
                        <?php
                        if ($rMascotas == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Se aceptan mascotas</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($rFumar == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Prohibido fumar</p>
                            <?php
                        }
                        ?>
                    </div>
                    <br>
                    <h4 class="mb-2">Recreación</h4>
                    <!-- <div class="d-flex justify-content-around col-12"> -->
                    <div>
                        <?php
                        if ($srAlberca == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Alberca</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($srNiños == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Área de juegos infantiles</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($srTeniscancha == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Cancha de tenis</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($srGimnasio == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Gimnasio</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($srJacuzzi == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Jacuzzi</p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($srUsos == 1) {
                            ?>
                            <p><i class="fa-solid fa-circle-check"></i> Salón de usos múltiples</p>
                            <?php
                        }
                        ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="caja2">
            <div class="container position-relative">
                <div class="d-flex justify-content-center">
                    <div class="contacto">
                        <a href="../../../../php/modulos/vendedor/perfil/miPerfil.php">
                            <img src="../../../../img/perfilIMG/<?php echo $profilepic; ?>" alt="">
                        </a>
                    </div>
                </div>
                <h3 class=" pt-3" style="text-align: center;">CONTACTO</h3>
                <hr class="sidebar-divider" style="border: none; height: 1px; background-color: #929292;">
                <div>
                    <h5><i class="fa-solid fa-user" style="color: #2b91df;"></i> Propietario:
                        <?php echo $nombres . " " . $apellidos; ?>
                    </h5>
                    <br>
                    <h5><i class="fa-solid fa-envelope" style="color: #2b91df;"></i> Correo:
                        <?php echo $correo; ?>
                    </h5>
                </div>
                <!-- <hr class="sidebar-divider">
            <div>
                <input type="text" class="form-control mb-2" id="floatingInputGrid" placeholder="nombre" value="">
                <input type="email" class="form-control mb-2" id="floatingInputGrid" placeholder="correo@example.com" value="">
                <div class="input-group mb-3">
                    <select name="estado" id="estado" class="w-1 form-control ">
                        <option value="" disabled selected> +52 </option>
                    </select>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                </div>
                <textarea class="form-control mb-2" placeholder="Mensaje" id="floatingTextarea2" style="height: 200px"></textarea>

                <Button class="form-control btn-outline-info" type="submit">Enviar</Button>
            </div> -->
            </div>
        </div>
    </div>

<?php
include '../../../../templates/footer.php';
?>