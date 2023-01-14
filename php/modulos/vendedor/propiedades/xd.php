<?php
if(isset($_POST['guardar'])){
    $tmp_name=$_FILES['input-file']['tmp_name'];

    $image_info = getimagesize($tmp_name);
    $image_width = $image_info[0];
    $image_height = $image_info[1];

    echo $image_height;
    echo $image_width;
}
?>