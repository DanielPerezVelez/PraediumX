<?php

function conectarDB() : mysqli {
    $conexion = mysqli_connect('localhost', 'root', '', 'bdmmo1');

    if(!$conexion) {
        echo "error";
        exit;
    }
    return $conexion;
}


