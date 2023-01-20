<?php
require "../../../../php/conexion.php";
$conexion= conectarDB();
$idinm=3;
$post1=array();

$selectServExt="SELECT * FROM servext WHERE idinm='$idinm'";
$resultServExt = mysqli_query($conexion,$selectServExt);

while ($row = $resultServExt->fetch_assoc()) {
    array_push($post1,$row);
    $sePlaya=$row['playa'];
    $seBalcon=$row['balcon'];
    $seCisterna=$row['cisterna'];
    $seRoof=$row['roof'];
    $seEasypark=$row['easypark'];
    $sePlayafrente=$row['playafrente'];
    $seAguafrente=$row['aguafrente'];
    $seGaraje=$row['garaje'];
    $seJardin=$row['jardin'];
    $seParrilla=$row['parrilla'];
    $sePatio=$row['patio'];
    $seAspersion=$row['aspersion'];
    $seRoofgarden=$row['roofgarden'];
    $seTerraza=$row['terraza'];
    $seVistagua=$row['vistagua'];
    $seVistamar=$row['vistamar'];
}

$selectServGen="SELECT * FROM servgen WHERE idinm='$idinm'";
$resultServGen = mysqli_query($conexion,$selectServGen);

while ($row = $resultServGen->fetch_assoc()) {
    $sgI18=$row['i18'];
    $sgDiscapacitados=$row['discapacitados'];
    $sgAa=$row['aa'];
    $sgAlarma=$row['alarma'];
    $sgAmueblado=$row['amueblado'];
    $sgBodega=$row['bodega'];
    $sgCalefaccion=$row['calefaccion'];
    $sgChimenea=$row['chimenea'];
    $sgCircuito=$row['circuito'];
    $sgCocina=$row['cocina'];
    $sgCocinaequipada=$row['cocinaequipada'];
    $sgConmutador=$row['conmutador'];
    $sgRoomservice=$row['roomservice'];
    $sgPlantas2=$row['plantas2'];
    $sgElevador=$row['elevador'];
    $sgFraccpriv=$row['fraccpriv'];
    $sgHidroneum=$row['hidroneum'];
    $sgPenthouse=$row['penthouse'];
    $sgPlantabaja=$row['plantabaja'];
    $sgPlantaelectrica=$row['plantaelectrica'];
    $sgPortero=$row['portero'];
    $sgSeguridad=$row['seguridad'];
    $sgUnaplanta=$row['unaplanta'];
}

$selectServRecrea="SELECT * FROM servrecrea WHERE idinm='$idinm'";
$resultServRecrea = mysqli_query($conexion,$selectServRecrea);

while ($row = $resultServRecrea->fetch_assoc()) {
    array_push($post1,$row);
    $srAlberca=$row['alberca'];
    $srNiños=$row['niños'];
    $srTeniscancha=$row['teniscancha'];
    $srGimnasio=$row['gimnasio'];
    $srJacuzzi=$row['jacuzzi'];
    $srUsos=$row['usos'];
}

$selectRestr="SELECT * FROM restricciones WHERE idinm='$idinm'";
$resultRestr = mysqli_query($conexion,$selectRestr);

while ($row = $resultRestr->fetch_assoc()) {
    array_push($post1,$row);
    $rMascotas=$row['mascotas'];
    $rFumar=$row['fumar'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/6.2.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>
                    j
                </th>
                <th>
                    dnflKDNFLK
                </th>
            </tr>
        </thead>
    </table>
    <div>
                <h3>AMENIDADES</h3>
                <br>
                <h4 class="mb-2">Exterior</h4>
                <div class="d-flex justify-content-around col-12">
                    <?php
                        if($sePlaya==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Acceso a Playa</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seBalcon==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Balcón</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seCisterna==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Cisterna</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seRoof==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Estacionamiento techado</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seEasypark==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Facilidad para estacionarse</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($sePlayafrente==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Frente a la playa</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seAguafrente==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Frente al agua</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seGaraje==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Garaje</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seJardin==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Jardín</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seParrilla==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Parrilla</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($sePatio==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Patio</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seAspersion==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Riego por aspersión</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seRoofgarden==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Jardín en el techo</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seTerraza==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Terraza</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seVistagua==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Vista al agua</p>
                    <?php
                        }
                    ?>
                    <?php
                        if($seVistamar==1){
                    ?>
                        <p><i class="fa-solid fa-circle-check"></i> Vista al mar</p>
                    <?php
                        }
                    ?>
                </div>


    </div>
    
</body>
</html>

<?php
echo "<pre>";
print_r($post1);
echo "<pre>";

?>