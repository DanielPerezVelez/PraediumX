<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    echo json_encode([
        'a' => 201
    ]);
}
