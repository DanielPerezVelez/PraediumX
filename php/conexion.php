<?php

function conectarDB() : mysqli {
    $conexion = mysqli_connect('localhost', 'root', '', 'praedium');
    $conexion->set_charset("utf8");

    if(!$conexion) {
        echo "error";
        exit;
    }
    return $conexion;    
}