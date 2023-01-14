<?php
require "../../../../php/conexion.php";
$conexion= conectarDB();
$posts=array();

$stmt="SELECT * FROM prueba";
$stmt1=mysqli_query($conexion,$stmt);


while ($row = $stmt1->fetch_assoc()){
    array_push($posts,$row);
}