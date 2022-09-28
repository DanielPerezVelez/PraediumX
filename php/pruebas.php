<?php
require_once("conexion.php");
require_once("funciones.php");
$conexion= conectarDB();
session_start();
$a= $_SESSION['idcliente'];

$query="SELECT nacionalidades.nacionalidad
FROM cliente INNER JOIN nacionalidades ON cliente.idnacionalidad = nacionalidades.idnacionalidad WHERE idcliente='$a'";
$resultado = mysqli_query($conexion,$query);

while ($row = $resultado->fetch_assoc()) {
    echo $row['nacionalidad'];
}