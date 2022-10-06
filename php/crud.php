<?php
require_once("../../conexion.php");
require_once("../../funciones.php");
$conexion= conectarDB();

$idcliente=$_SESSION['idcliente'];

$query = "SELECT * FROM cliente WHERE idcliente='$idcliente'";
$resultado = mysqli_query($conexion,$query);
while($row=$resultado->fetch_assoc()){
     $nombre=$row['nombres'];

}
$query2 = "SELECT * FROM propiedades";
$resultado2 = mysqli_query($conexion,$query2);

?>