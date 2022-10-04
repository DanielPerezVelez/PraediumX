<?php
session_start();
//Valida si ha iniciado sesion, sino, te redirige al login screen
if(!isset($_SESSION['usermail'])){
    sleep(1);
    header("location: php/login-system/loginScreen.php");
}
//El sistema evalúa qué tipo de usuario es, para mostrar un header o footer diferente
$rol=$_SESSION['rol'];
if($rol==4){
    include 'templatesIndex/indexHeaderVendedor.php';
}
if($rol==3){
    include 'templatesIndex/indexHeaderComprador.php';
}
if($rol==1){
    include 'templatesIndex/indexHeaderAdmin.php';
}
//Incluye el footer
include 'templatesIndex/footer.php';