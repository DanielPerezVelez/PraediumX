<?php session_start();
require_once("../conexion.php");
require_once("../funciones.php");

$conexion= conectarDB();
$correo= clean($_POST ['loginCorreo']);
$password= md5($_POST ['loginPassword']);

$query="SELECT * FROM cliente WHERE correo='$correo' AND password='$password'";
$resultado=mysqli_query($conexion,$query);
//Aqui compara si la consulta es verdadera, de ser verdadera (que haya registros similares) se completará el login
if(mysqli_num_rows($resultado) > 0){
    while($row=mysqli_fetch_array($resultado)){
        if($correo==$row["correo"] && $password==$row["password"]){
            $_SESSION['usermail']=$correo;
            $_SESSION['idcliente']=$row['idcliente'];
            $_SESSION['nombres']=$row['nombres'];
            $_SESSION['apellidos']=$row['apellidos'];
            $_SESSION['nacionalidad']=$row['idnacionalidad'];
            $_SESSION['aboutme']=$row['aboutme'];
            $_SESSION['ciudadresi']=$row['ciudadresi'];
            $_SESSION['ciudadorigen']=$row['ciudadorigen'];
            $_SESSION['sexo']=$row['idsexo'];
            $_SESSION['anionac']=$row['idanio'];
            $_SESSION['profilepic']=$row['profilepic'];
            $_SESSION['rol']=$row['idrolclt'];
            //te manda al dashboard
            header("location: ../../index.php");
            /*$query2="SELECT nacionalidad FROM nacionalidades INNER JOIN cliente ON
                    nacionalidades.idnacionalidad=cliente.idnacionalidad";
            $resultado2=mysqli_query($conexion,$query2);
            if($nacionalidad=mysqli_fetch_array($resultado2)){
                $_SESSION['nacionalidad']=$nacionalidad['nacionalidad'];
            }*/
            
        }
    }
}else{
    //Error de login
    sleep(1);
    header("location: loginScreen.php?errorLogin=true");
}

mysqli_close($conexion);