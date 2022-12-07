<?php
session_start();
$rol = $_SESSION['rol'];
include '../../../templates/headerAdmin.php';
include '../../crud.php';
?>
<div class="container h-100">
    <form id="form" action="addProp.php" method="POST" enctype="multipart/form-data">
        <!-- INICIO DEL DIV DEL TITULO -->
        <div class="d-flex justify-content-between">
            <h1>Crear Propiedad.</h1>
            <div>
                <button class="btn btn-info" type="submit" name="guardar" id="guardar"> Crear <i class="fa-solid fa-check"></i></button>
            </div>
        </div>
        <!-- FIN DEL DIV DEL TITULO -->
        <div>
            <!-- INICIO DEL DIV DE OPCIONES -->
            <div class="d-flex justify-content-between">
                <div class="formulario-propiedad">
                    <div class="div-a">
                        <a>Tipo de propiedad</a>
                        <div>
                            <select name="select-tipin" class="form-control">
                                <?php
                                $conexion = conectarDB();
                                $sql = 'SELECT * FROM tipin';
                                $query = mysqli_query($conexion, $sql);

                                while ($row = mysqli_fetch_array($query)) {
                                    $idtipin = $row['idtipin'];
                                    $tipo = $row['tipo'];
                                ?>
                                    <option value="<?php echo $idtipin ?>"><?php echo $tipo ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Título del anuncio</a>
                        <div class="div-input">
                            <input class="form-control" name="input-titulo"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Descripción del anuncio</a>
                        <div class="div-input">
                            <input class="form-control" name="input-descripcion"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Precio</a>
                        <div class="div-input">
                            <input class="form-control" name="input-precio" />
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Tipo de operación</a>
                        <div class="div-input">
                            <select class="form-control" name="select-tipop">
                                <?php
                                $conexion = conectarDB();
                                $sqlOp = 'SELECT * FROM operacion';
                                $queryOp = mysqli_query($conexion, $sqlOp);

                                while ($row = mysqli_fetch_array($queryOp)) {
                                    $idop = $row['idop'];
                                    $tipo2 = $row['tipo'];
                                    if ($idop == 1 || $idop == 2) {
                                ?>
                                        <option value="<?php echo $idop ?>"><?php echo $tipo2 ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Recámaras</a>
                        <div class="div-input">
                            <input class="form-control" name="input-recamaras"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Baños</a>
                        <div class="div-input">
                            <input class="form-control" name="input-baños"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Medios baños</a>
                        <div class="div-input">
                            <input class="form-control" name="input-medbañ"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Estacionamientos</a>
                        <div class="div-input">
                            <input class="form-control" name="input-estacionamientos"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Construcción</a>
                        <div class="div-input">
                            <input class="form-control" name="input-construccion"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Terreno</a>
                        <div class="div-input">
                            <input class="form-control" name="input-terreno"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Largo del terreno</a>
                        <div class="div-input">
                            <input class="form-control" name="input-largter"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Ancho del terreno</a>
                        <div class="div-input">
                            <input class="form-control" name="input-anchoter"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Año de construcción</a>
                        <div class="div-input">
                            <input class="form-control" name="input-anio"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Piso ubicado</a>
                        <div class="div-input">
                            <input class="form-control" name="input-pisoubi"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Número de pisos del edificio</a>
                        <div class="div-input">
                            <input class="form-control" name="input-pisos"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Clave interna</a>
                        <div class="div-input">
                            <input class="form-control" name="input-clave"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Código de llave</a>
                        <div class="div-input">
                            <input class="form-control" name="input-codigo"></input>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <h2> Ubicación </h2>
                    <div class="div-a">
                        <a>País</a>
                        <div class="div-input">
                            <select class="form-control" name="select-pais">
                                <?php
                                $conexion = conectarDB();
                                $sqlPa = 'SELECT * FROM paises';
                                $queryPa = mysqli_query($conexion, $sqlPa);

                                while ($row = mysqli_fetch_array($queryPa)) {
                                    $idpais = $row['idpais'];
                                    $nombrePa = $row['nombre'];
                                ?>
                                    <option value="<?php echo $idpais ?>"><?php echo $nombrePa ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Estado</a>
                        <div class="div-input">
                            <select class="form-control" name="select-estado">
                                <?php
                                $conexion = conectarDB();
                                $sqlEs = 'SELECT * FROM estados';
                                $queryEs = mysqli_query($conexion, $sqlEs);

                                while ($row = mysqli_fetch_array($queryEs)) {
                                    $idestado = $row['idestado'];
                                    $nombreEs = $row['nombre'];
                                ?>
                                    <option value="<?php echo $idestado ?>"><?php echo $nombreEs ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Ciudad/Delegación</a>
                        <div class="div-input">
                            <input class="form-control" name="input-ciudad"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Calle</a>
                        <div class="div-input">
                            <input class="form-control" name="input-calle"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Esquina</a>
                        <div class="div-input">
                            <input class="form-control" name="input-esquina"></input>
                        </div>
                    </div>
                    <div class="div-a">
                        <a>Código postal</a>
                        <div class="div-input">
                            <input class="form-control" name="input-cp"></input>
                        </div>
                    </div>
                    <div>
                    <hr class="sidebar-divider">
                        <div id="dropArea" class="div-drop-area">
                            <h2 id="dragText">Imagenes</h2>
                            <!-- <button type="button" id="seleccionar-pics">Selecciona tus archivos</button> -->
                            <div class="d-flex justify-content-center">
                                <button class="adjuntar-archivo">
                                    <label for="uploadImage"> <i class="fa-solid fa-image me"></i>Adjuntar Imagen</label>
                                    <input class="adjuntar-archivo" required type="file" name="input-file[]" id="input-file" accept=".jpg, .jpeg, .png" multiple>
                                </button>
                            </div>
                        </div>
                        <div id="preview" name="preview">

                        </div>
                    </div>
                </div>
                <div class="formulario-caracteristicas">
                    <h2>Características de la propiedad</h2>
                    <hr class="sidebar-divider">
                    <div class="div-b">
                        <h4>Exterior</h4>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-playa" value="No" />
                                <input type="checkbox" name="input-playa" value="Si" />
                                <a>Acceso a playa</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-balcon" value="No" />
                                <input type="checkbox" name="input-balcon" value="Si" />
                                <a>Balcón</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-cisterna" value="No" />
                                <input type="checkbox" name="input-cisterna" value="Si" />
                                <a>Cisterna</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-roof" value="No" />
                                <input type="checkbox" name="input-roof" value="Si" />
                                <a>Estacionamiento techado</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-easypark" value="No" />
                                <input type="checkbox" name="input-easypark" value="Si" />
                                <a>Facilidad para estacionarse</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-playafrente" value="No" />
                                <input type="checkbox" name="input-playafrente" value="Si" />
                                <a>Frente a la playa</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-aguafrente" value="No" />
                                <input type="checkbox" name="input-aguafrente" value="Si" />
                                <a>Frente al agua</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-garaje" value="No" />
                                <input type="checkbox" name="input-garaje" value="Si" />
                                <a>Garaje</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-jardin" value="No">
                                <input type="checkbox" name="input-jardin" value="Si" />
                                <a>Jardín</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-parrilla" value="No" />
                                <input type="checkbox" name="input-parrilla" value="Si" />
                                <a>Parrilla</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-patio" value="No" />
                                <input type="checkbox" name="input-patio" value="Si" />
                                <a>Patio</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-aspersion" value="No" />
                                <input type="checkbox" name="input-aspersion" value="Si" />
                                <a>Riego por aspersión</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-roofgarden" value="No" />
                                <input type="checkbox" name="input-roofgarden" value="Si" />
                                <a>Jardín en el techo</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-terraza" value="No" />
                                <input type="checkbox" name="input-terraza" value="Si" />
                                <a>Terraza</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-vistagua" value="No" />
                                <input type="checkbox" name="input-vistagua" value="Si" />
                                <a>Vista al agua</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-vistamar" value="No" />
                                <input type="checkbox" name="input-vistamar" value="Si" />
                                <a>Vista al mar</a>
                            </div>
                        </div>
                    </div>

                    <div class="div-b">
                        <hr class="sidebar-divider">
                        <h4>General</h4>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-18" value="No" />
                                <input type="checkbox" name="input-18" value="Si" />
                                <a>Accesibilidad para adultos mayores</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-discapacitados" value="No" />
                                <input type="checkbox" name="input-discapacitados" value="Si" />
                                <a>Accesibilidad para personas con discapacidad</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-aa" value="No" />
                                <input type="checkbox" name="input-aa" value="Si" />
                                <a>Aire acondicionado</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-alarma" value="No" />
                                <input type="checkbox" name="input-alarma" value="Si" />
                                <a>Alarma</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-amueblado" value="No" />
                                <input type="checkbox" name="input-amueblado" value="Si" />
                                <a>Amueblado</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-bodega" value="No" />
                                <input type="checkbox" name="input-bodega" value="Si" />
                                <a>Bodega</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-calefaccion" value="No" />
                                <input type="checkbox" name="input-calefaccion" value="Si" />
                                <a>Calefacción</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-chimenea" value="No" />
                                <input type="checkbox" name="input-chimenea" value="Si" />
                                <a>Chimenea</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-circuito" value="No" />
                                <input type="checkbox" name="input-circuito" value="Si" />
                                <a>Circuito cerrado</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-cocina" value="No" />
                                <input type="checkbox" name="input-cocina" value="Si" />
                                <a>Cocina</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-cocinaequipada" value="No" />
                                <input type="checkbox" name="input-cocinaequipada" value="Si" />
                                <a>Cocina equipada</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-conmutador" value="No" />
                                <input type="checkbox" name="input-conmutador" value="Si" />
                                <a>Conmutador</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-roomservice" value="No" />
                                <input type="checkbox" name="input-roomservice" value="Si" />
                                <a>Cuarto de servicio</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-2plantas" value="No" />
                                <input type="checkbox" name="input-2plantas" value="Si" />
                                <a>Dos plantas</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-elevador" value="No" />
                                <input type="checkbox" name="input-elevador" value="Si" />
                                <a>Elevador</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-fraccpriv" value="No" />
                                <input type="checkbox" name="input-fraccpriv" value="Si" />
                                <a>Fraccionamiento privado</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-hidroneum" value="No" />
                                <input type="checkbox" name="input-hidroneum" value="Si" />
                                <a>Hidroneumático</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-penthouse" value="No" />
                                <input type="checkbox" name="input-penthouse" value="Si" />
                                <a>Penthouse</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-plantabaja" value="No" />
                                <input type="checkbox" name="input-plantabaja" value="Si" />
                                <a>Planta baja</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-plantaelectrica" value="No" />
                                <input type="checkbox" name="input-plantaelectrica" value="Si" />
                                <a>Planta eléctrica</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-portero" value="No" />
                                <input type="checkbox" name="input-portero" value="Si" />
                                <a>Portero</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-seguridad12" value="No" />
                                <input type="checkbox" name="input-seguridad12" value="Si" />
                                <a>Seguridad 12 horas</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-seguridad24" value="No" />
                                <input type="checkbox" name="input-seguridad24" value="Si" />
                                <a>Seguridad 24 horas</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-unaplanta" value="No" />
                                <input type="checkbox" name="input-unaplanta" value="Si" />
                                <a>Una sola planta</a>
                            </div>
                        </div>
                    </div>

                    <div class="div-b">
                        <hr class="sidebar-divider">
                        <h4>Políticas</h4>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-mascotas" value="No" />
                                <input type="checkbox" name="input-mascotas" value="Si" />
                                <a>Se aceptan mascotas</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-fumar" value="No" />
                                <input type="checkbox" name="input-fumar" value="Si" />
                                <a>Prohibido fumar</a>
                            </div>
                        </div>
                    </div>

                    <div class="div-b">
                        <hr class="sidebar-divider">
                        <h4>Recreación</h4>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-alberca" value="No" />
                                <input type="checkbox" name="input-alberca" value="Si" />
                                <a>Alberca</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-niños" value="No" />
                                <input type="checkbox" name="input-niños" value="Si" />
                                <a>Área de juegos infantiles</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-teniscancha" value="No" />
                                <input type="checkbox" name="input-teniscancha" value="Si" />
                                <a>Cancha de tenis</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-gimnasio" value="No" />
                                <input type="checkbox" name="input-gimnasio" value="Si" />
                                <a>Gimnasio</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-jacuzzi" value="No" />
                                <input type="checkbox" name="input-jacuzzi" value="Si" />
                                <a>Jacuzzi</a>
                            </div>
                        </div>
                        <div class="container-checkbox">
                            <div class="div-checkbox">
                                <input type="hidden" name="input-usos" value="No" />
                                <input type="checkbox" name="input-usos" value="Si" />
                                <a>Salón de usos múltiples</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN DEL DIV DE CARACTERISTICAS -->
        </div>
        <!-- FIN DEL DIV FORM -->
        <!-- INICIO DEL DIV DEL DRAG AND DROP -->

        <!-- FIN DEL DIV DEL DRAG AND DROP -->
        <!--Estoy haciendo que todo se haga por medio de javascript, sin necesidad de
        ponerle al form el tipico action="addProp.php" method="POST" para que me agarre las imagenes de una-->
    </form>
</div>
<!-- <script src="../../../js/scriptsVendedor/dragAnDrop.js"></script>
<script src="../../../js/scriptsVendedor/pruebas.js"></script> -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- <script>
        const form = document.getElementById('form');
        form.addEventListener('submit', uploadFile);

        function uploadFile(event) {
            event.preventDefault();
            console.clear();

            let files = document.querySelector('#input-file').files;

            if (!files[0]) {
                return Swal.fire({
                    title: 'Error de imágenes',
                    text: `No has seleccionado ninguna imagen`,
                    icon: 'error',
                    showConfirmButton: 'true',
                });
            }

            let filesLength = Object.entries(files).length;

            let currentFile = 0;

            for (const value of Object.entries(files)) {

                if (!/\.(jpe?g|png|gif)$/i.test(value[1].name)) {
                    return Swal.fire({
                        title: 'Archivo no válido',
                        text: `El archivo ${value[1].name} no es valido`,
                        icon: 'error',
                        showConfirmButton: 'true',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location = '/gallery/panelUpload.php';
                        }
                    });
                }

                const key = Object.entries(files).indexOf(value);
                let formData = new FormData();
                formData.append('input-file', value[1]);

                var http = new XMLHttpRequest();
                var url = '/gallery/uploadImage.php';
                http.open('POST', url, true);

                http.onreadystatechange = function() {
                    if (this.readyState === 4) {
                        const data = JSON.parse(this.responseText);
                        // console.log(data);
                        currentFile++;
                        document.getElementById('progress').innerHTML =
                            `<p>Subiendo: ${value[1].name}</p>
                        <p>Imágenes subidas: ${currentFile}/${filesLength}</p>
                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700" style="height: 22px;">
                            <div class="bg-blue-900 rounded-full z-50" style="width: ${Math.floor(100/filesLength) * currentFile}%; height: 100%"></div>
                        </div>`;

                        if (currentFile === filesLength) {
                            document.getElementById('progress').innerHTML =
                                `<p>All images were successfully uploaded</p>`;
                            // Reset all things;
                            form.reset();
                        }
                    }
                }
                http.send(formData);
            }
        }        
    </script> -->

<?php
include '../../../templates/footer.php';
?>