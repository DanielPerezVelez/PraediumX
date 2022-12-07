<?php

function conectarDB() : mysqli {
    $conexion = mysqli_connect('sql9.freesqldatabase.com', 'sql9582981', 'XZiEKIJ3TR', 'sql9582981');
    $conexion->set_charset("utf8");

    if(!$conexion) {
        echo "error";
        exit;
    }
    return $conexion;   
}