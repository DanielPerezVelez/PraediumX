<?php session_start();
require_once("../../conexion.php");
require_once("../../funciones.php");
$conexion= conectarDB();
//INPUTS pasados a variables
$tipin= clean($_POST ['select-tipin']);
$titulo= clean($_POST ['input-titulo']);
$descripcion= clean($_POST ['input-descripcion']);
$precio= clean($_POST ['input-precio']);
$tipop= clean($_POST ['select-tipop']);
$recamaras= clean($_POST ['input-recamaras']);
$baños= clean($_POST ['input-baños']);
$medbañ= clean($_POST ['input-medbañ']);
$estacionamientos= clean($_POST ['input-estacionamientos']);
$construccion= clean($_POST ['input-construccion']);
$terreno= clean($_POST ['input-terreno']);
$largter= clean($_POST ['input-largter']);
$anchoter= clean($_POST ['input-anchoter']);
$anio= clean($_POST ['input-anio']);
$pisoubi= clean($_POST ['input-pisoubi']);
$pisos= clean($_POST ['input-pisos']);
$clave= clean($_POST ['input-clave']);
$codigo= clean($_POST ['input-codigo']);
$calle= clean($_POST ['input-calle']);
$esquina= clean($_POST ['input-esquina']);
$cp= clean($_POST ['input-cp']);
//CHECKBOX pasados a variables
// $playa=clean($_POST['input-playa']);

$idcliente=$_SESSION['idcliente'];

if(isset($_POST['guardar'])){
$queryProp= "INSERT INTO inmueble(titulo,descripcion,precio,recamaras,
baños,medios_baños,estacionamientos,construccion,terreno,largoter,anchoter,añoconst,
numero_pisos,piso_ubicacion,clave,codigo,calle,esquina,cp,idcliente,idop,idtipin) 
VALUES
('$titulo','$descripcion','$precio','$recamaras','$baños','$medbañ',
'$estacionamientos','$construccion','$terreno','$largter','$anchoter','$anio','$pisos',
'$pisoubi','$clave','$codigo','$calle','$esquina','$cp','$idcliente','$tipop','$tipin')";

$resultado = mysqli_query($conexion,$queryProp);
header("location: propiedades.php");
}

//form data <------ mas de 1 foto