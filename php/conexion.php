<?php

function conectarDB() : mysqli {
    $conexion = mysqli_connect('sql140.main-hosting.eu', 'u140895973_praedium', 'q^B##3xAo5K|', 'u140895973_praedium');

    if(!$conexion) {
        echo "error";
        exit;
    }
    return $conexion;
}