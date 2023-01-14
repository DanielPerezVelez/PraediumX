<?php session_start();
require_once("../../conexion.php");
$conexion= conectarDB();

$a="SELECT * FROM fotosProp WHERE idinm=109";
$aa=mysqli_query($conexion,$a);
while($fotoProp=mysqli_fetch_assoc($aa)){
    $imagenn=$fotoProp['imagen'];
    print_r($imagenn);
}
    if(isset($_POST['submit'])){
        echo '<pre>';
        $array=$_FILES;
        print_r($array);
    }
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="input-file[]" multiple/>
    <input type="submit" name="submit"/>
</form>