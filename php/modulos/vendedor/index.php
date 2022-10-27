<?php session_start();
require_once("../../conexion.php");
$conexion= conectarDB();

    if(isset($_POST['submit'])){
        // echo '<pre>';
        // print_r($_FILES);
        $img_name=$_FILES['input-file']['name'];
        $tmp_name=$_FILES['input-file']['tmp_name'];

        foreach($img_name as $key=>$val){
            $rand=rand('11111111','99999999');
            $file_name=$rand.'_'.$val;
            $img_upload_path='../../../img/casasIMG/'.$file_name;
            // move_uploaded_file($tmp_name[$key],$img_upload_path);
            echo $file_name;
            $query="INSERT INTO fotosProp (imagen,idinm) VALUES ('$file_name',76)";
            mysqli_query($conexion,$query);
            
         
        }
    }
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="input-file[]" multiple/>
    <input type="submit" name="submit"/>
</form>