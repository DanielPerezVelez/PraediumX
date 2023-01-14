<?php 

$arrOptions = array(
    PDO::ATTR_EMULATE_PREPARES => FALSE, 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
);

$server='localhost';
$username='root';
$password='';
$database='praedium';

try{
    $conn=new PDO("mysql:host=$server;dbnmame=$database;",$username,$password,$arrOptions);
}catch(PDOException $e){
    die('Connection fallada: '.$e->getMessage());
}

?>