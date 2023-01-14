<?php
session_start();
$rol=$_SESSION['rol'];
include '../../../../templates/headerVendedor.php';
$idcliente=$_SESSION['idcliente'];
$idinm=$_GET['idinm'];

$queryInmueble="SELECT * FROM inmueble WHERE idinm='$idinm'";
$resultInmueble=mysqli_query($conexion,$queryInmueble);

while ($propiedad = mysqli_fetch_assoc($resultInmueble)) {
    $idInm=$propiedad['idinm'];
    $titulo=$propiedad['titulo'];
    $descripcion=$propiedad['descripcion'];
    $precio=$propiedad['precio'];
    $recamaras=$propiedad['recamaras'];
    $baños=$propiedad['baños'];
    $medban=$propiedad['medios_baños'];
    $estacionamientos=$propiedad['estacionamientos'];
    $construccion=$propiedad['construccion'];
    $terreno=$propiedad['terreno'];
    $numpis=$propiedad['numero_pisos'];
    $ciudad=$propiedad['ciudad'];
    $direccion=$propiedad['direccion'];
    $foto=$propiedad['foto'];

    $idPais=$propiedad['idpais'];
    $idOp=$propiedad['idop'];
}
//Inner join para mostrar el estado del inmueble
$queryEstado="SELECT *
FROM inmueble INNER JOIN estados
ON inmueble.idestado = estados.idestado WHERE idinm='$idinm'";

$resultadoEstado = mysqli_query($conexion,$queryEstado);
while ($row = $resultadoEstado->fetch_assoc()) {
    $nombrestado=$row['nombre'];
}
//Inner join para mostrar info del propietario
$queryInfoCliente="SELECT *
FROM inmueble INNER JOIN cliente
ON inmueble.idcliente = cliente.idcliente WHERE idinm='$idinm'";

$resultadoInfoCliente = mysqli_query($conexion,$queryInfoCliente);
while ($row = $resultadoInfoCliente->fetch_assoc()) {
    $nombres=$row['nombres'];
    $apellidos=$row['apellidos'];
    $correo=$row['correo'];
    $profilepic=$row['profilepic'];
}
?>

<div class="d-flex">
    <div class="caja">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2><?php echo $titulo;?></h2>
                <Button class="btn btn-outline-info my-4"><i class="fa-solid fa-pencil"></i> Editar</Button>
            </div>
            <div class="d-flex justify-content-center width='100%' height='100%'">
                <img class="mx-auto w-100" height="400"src="../../../../img/pubIMG/<?php echo $foto;?>">
            </div>
            <div class="d-flex justify-content-left">
                <h3 class="p-3">$<?php echo number_format($precio);?> MXN</h3>
                <div class="d-flex position-relative">
                    <span><?php if($idOp==1){echo "En venta";}if($idOp==2){echo "Renta";} ?></span>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <p><i class="fas fa-bed padding-2"></i> Recámaras: <?php echo $recamaras;?></p>
                <p><i class="fa-solid fa-shower"></i> Baños: <?php echo $baños;?></p>
                <p><i class="fa-solid fa-toilet"></i> Medios baños: <?php echo $medban;?></p>
                <p><i class="fa-solid fa-square-parking"></i> Estacionamientos: <?php echo $medban;?></p>
            </div>
            <div class="d-flex justify-content-around">
                <p><i class="fa-solid fa-building-user"></i> Construccion: <?php echo $medban;?></p>
                <p><i class="fa-solid fa-stairs"></i> Número de pisos: <?php echo $medban;?></p>
                <p><i class="fa-solid fa-tree-city"></i> Terreno: <?php echo $terreno;?> m2</p>
            </div>
            <hr class="sidebar-divider">
            <div class="d-flex justify-content-around">
                <p><i class="fa-solid fa-earth-americas"></i> País: <?php if($idPais==1){echo "México";}?></p>
                <p><i class="fa-solid fa-location-dot"></i></i> Estado: <?php echo $nombrestado;?></p>
                <p><i class="fa-solid fa-map-location-dot"></i> Ciudad: <?php echo $ciudad;?></p>
            </div>
            <hr class="sidebar-divider">
            <div>
                <h3>DESCRIPCION</h3>
                <p><?php echo $descripcion;?></p>
                <p><?php echo $direccion;?></p>
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
                    <img src="../../../../img/perfilIMG/<?php echo $profilepic;?>" alt="">
                </div>
            </div>
            <h3 class=" pt-3">CONTACTO</h3>
            <hr class="sidebar-divider">
            <div>
                <h5>Propietario: <?php echo $nombres." ".$apellidos;?></h5>
                <p><i class="fa-solid fa-envelope"></i> Correo: <?php echo $correo;?></p>
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
                <h5>Galería de fotos</h5>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
                            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
                            $querySI="SELECT * FROM fotosprop WHERE idinm='$idinm'";
                            $articulos=mysqli_query($conexion,$querySI);
                            $num_registros=@mysqli_num_rows($articulos);
                            $registros= '3';
                            $pagina=$_REQUEST["nume"];
                            if (is_numeric($pagina))
                            $inicio= (($pagina-1)*$registros);
                            else
                            $inicio=0;
                            $xd="SELECT * FROM fotosprop WHERE idinm='$idinm' LIMIT $inicio,$num_registros";
                            $xd2=mysqli_query($conexion,$xd);

                            while($propiedaddd=mysqli_fetch_assoc($xd2)){
                                $a=$propiedaddd['imagen'];
                            
                        ?>
                        <div class="carousel-item active width='100%'">
                            <img src="../../../../img/casasIMG/<?php echo $a;?>" class="d-block w-100" height='150'>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <button class="carousel-control-prev background-transparent" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include '../../../../templates/footer.php';
?>