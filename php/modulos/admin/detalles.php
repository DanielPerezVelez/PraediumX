<?php
session_start();
$rol = $_SESSION['rol'];
include '../../conexion.php';
include '../../../templates/headerAdmin.php';
include '../../crud.php';
?>
<div class="d-flex">
    <div class="caja">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2>Titulo de la Propiedad</h2>
                <Button class="btn btn-outline-info my-4"><i class="fa-solid fa-pencil"></i> Editar</Button>
            </div>
            <div class="d-flex justify-content-center">
                <img class="mx-auto" width="100" src="../../../img/casa.png">
            </div>
            <h3 class="p-3">$ Precio</h3>

            <div class="d-flex justify-content-around">
                <p><i class="fa-solid fa-person-shelter"> : </i></p>
                <p><i class="fa-solid fa-shower"> : </i></p>
                <p><i class="fa-solid fa-trowel"> :</i></p>
                <p><i class="fas fa-vector-square"> :</i></p>

            </div>
            <hr class="sidebar-divider">
            <div class="d-flex justify-content-around">
                <p><i class="fa-solid fa-map-location-dot"> :</i>Direccion</p>
            </div>
            <hr class="sidebar-divider">
            <div>
                <h3>DESCRIPCION</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam gravida lorem non tortor ornare dictum. Nunc commodo viverra est, vel aliquet justo porttitor a. Morbi at interdum lectus. Etiam pharetra diam ut odio molestie placerat a ut magna. Etiam placerat ullamcorper posuere. Sed sit amet rutrum velit. Vivamus nec enim imperdiet, ornare neque quis, luctus ligula. Vivamus volutpat risus at vulputate placerat. Donec interdum urna in libero ornare lobortis. Maecenas et convallis erat. Morbi tempor sollicitudin felis, eget accumsan nunc convallis eu. Curabitur orci felis, porttitor at condimentum dictum, suscipit eget ante. Pellentesque tincidunt enim commodo mi varius, sit amet blandit nulla consectetur.
                    Etiam blandit vulputate ipsum quis tempor. Phasellus blandit egestas felis nec dictum. Phasellus quis nisl elit. Aliquam erat volutpat. Duis finibus rutrum lacinia. Fusce consectetur maximus leo, sit amet commodo mauris consectetur sit amet. Praesent dictum commodo porttitor. Nulla iaculis aliquam nibh pharetra mollis. Praesent sodales, mauris eget porttitor malesuada, dui sem eleifend neque, in tincidunt mi justo ut velit. Donec sed imperdiet ex, quis semper turpis. Cras ut turpis sit amet enim dignissim eleifend ut ac quam. In vitae justo auctor nibh ultricies auctor. Fusce et congue ligula, vel pharetra quam. Maecenas iaculis maximus velit, nec pretium mauris.</p>
            </div>
            <hr class="sidebar-divider">
            <div>
                <h3>AMENIDADES</h3>
                <br>
                <h4 class="mb-2">Exterior</h4>
                <div class="d-flex justify-content-around col-12">
                    <small><i class="fa-solid fa-circle-check"></i> Acceso a Playa</small>
                    <p><i class="fa-solid fa-circle-check"></i> Cisterna</p>
                    <p><i class="fa-solid fa-circle-check"></i> Estacionamiento Techado</p>
                    <p><i class="fa-solid fa-circle-check"></i> Facilidad para Estacionarse</p>
                    <p><i class="fa-solid fa-circle-check"></i> Frente a la playa</p>
                </div>
            </div>
        </div>


    </div>
    <div class="caja2">
        <div class="container position-relative">
            <div class="d-flex justify-content-center">
                <div class="contacto">
                    <img src="../../../img/foto2.jpg" alt="">
                </div>
            </div>
            <h3 class=" pt-3">CONTACTO</h3>
            <hr class="sidebar-divider">
            <div>
                <p><i class="fa-solid fa-envelope"> : </i> </p>
            </div>
            <!-- <hr class="sidebar-divider">
            <div>
                <input type="text" class="form-control mb-2" id="floatingInputGrid" placeholder="nombre" value="">
                <input type="email" class="form-control mb-2" id="floatingInputGrid" placeholder="correo@example.com" value="">
                <div class="input-group mb-3">
                    <select name="estado" id="estado" class="w-1 form-control ">
                        <option value="" disabled selected> +52 </option>
                        <?php
                        $estados = mysqli_query($conexion, "SELECT * FROM estados");
                        while ($nombre = mysqli_fetch_assoc($estados)) { ?>
                            <option value="<?php echo $nombre['idestado']; ?>"><?php echo $nombre['nombre']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                </div>
                <textarea class="form-control mb-2" placeholder="Mensaje" id="floatingTextarea2" style="height: 200px"></textarea>

                <Button class="form-control btn-outline-info" type="submit">Enviar</Button>
            </div> -->
            <hr class="sidebar-divider">
            <div class="redes">
                <h5>Compartir</h5>
                <div class="d-flex justify-content-around">
                    <button class="btn">
                        <i class="fs-2 fa-brands fa-facebook"></i>
                    </button>
                    <button class="btn">
                        <i class="fa-brands fa-twitter"></i>
                    </button>
                    <button class="btn">
                        <i class="fa-brands fa-whatsapp"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>



<?php
include '../../../templates/footer.php';
?>