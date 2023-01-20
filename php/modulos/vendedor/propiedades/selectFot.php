<?php
$posts=array();

$selectFotosProp="SELECT * FROM fotosprop WHERE idinm='$idinm'";
$resultFotosProp=mysqli_query($conexion,$selectFotosProp);


while ($row = $resultFotosProp->fetch_assoc()){
    array_push($posts,$row);
    $xpxd=$row['imagen'];
}

$selectServExt="SELECT * FROM servext WHERE idinm='$idinm'";
$resultServExt = mysqli_query($conexion,$selectServExt);

while ($row = $resultServExt->fetch_assoc()) {
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
    $rMascotas=$row['mascotas'];
    $rFumar=$row['fumar'];
}