<?php
require_once("php/conexion.php");
require_once("php/funciones.php");
$conexion= conectarDB();

$query = "SELECT * FROM cliente";
$resultado = mysqli_query($conexion,$query);
while($row=$resultado->fetch_assoc()){
     $a=$row['aboutme'];
}

?>