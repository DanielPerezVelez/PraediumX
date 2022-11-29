<?php session_start();
require_once("../../conexion.php");
require_once("../../funciones.php");
$conexion= conectarDB();
//INPUTS pasados a variables
$tipin= clean($_POST ['select-tipin']);
$titulo= clean($_POST ['input-titulo']);
$descripcion= clean($_POST ['input-descripcion']);
$precio= clean($_POST ['input-precio']);
$tipop= clean($_POST ['select-tipop']);
$recamaras= clean($_POST ['input-recamaras']);
$baños= clean($_POST ['input-baños']);
$medbañ= clean($_POST ['input-medbañ']);
$estacionamientos= clean($_POST ['input-estacionamientos']);
$construccion= clean($_POST ['input-construccion']);
$terreno= clean($_POST ['input-terreno']);
$largter= clean($_POST ['input-largter']);
$anchoter= clean($_POST ['input-anchoter']);
$anio= clean($_POST ['input-anio']);
$pisoubi= clean($_POST ['input-pisoubi']);
$pisos= clean($_POST ['input-pisos']);
$clave= clean($_POST ['input-clave']);
$codigo= clean($_POST ['input-codigo']);
$pais= clean($_POST ['select-pais']);
$estado= clean($_POST ['select-estado']);
$ciudad= clean($_POST ['input-ciudad']);
$calle= clean($_POST ['input-calle']);
$esquina= clean($_POST ['input-esquina']);
$cp= clean($_POST ['input-cp']);
//CHECKBOX pasados a variables
$playa=clean($_POST['input-playa']);
$balcon=clean($_POST['input-balcon']);
$cisterna=clean($_POST['input-cisterna']);
$roof=clean($_POST['input-roof']);
$easypark=clean($_POST['input-easypark']);
$playafrente=clean($_POST['input-playafrente']);
$aguafrente=clean($_POST['input-aguafrente']);
$garaje=clean($_POST['input-garaje']);
$jardin=clean($_POST['input-jardin']);
$parrilla=clean($_POST['input-parrilla']);
$patio=clean($_POST['input-patio']);
$aspersion=clean($_POST['input-aspersion']);
$roofgarden=clean($_POST['input-roofgarden']);
$terraza=clean($_POST['input-terraza']);
$vistagua=clean($_POST['input-vistagua']);
$vistamar=clean($_POST['input-vistamar']);

$i18=clean($_POST['input-18']);
$discapacitados=clean($_POST['input-discapacitados']);
$aa=clean($_POST['input-aa']);
$alarma=clean($_POST['input-alarma']);
$amueblado=clean($_POST['input-amueblado']);
$bodega=clean($_POST['input-bodega']);
$calefaccion=clean($_POST['input-calefaccion']);
$chimenea=clean($_POST['input-chimenea']);
$circuito=clean($_POST['input-circuito']);
$cocina=clean($_POST['input-cocina']);
$cocinaequipada=clean($_POST['input-cocinaequipada']);
$conmutador=clean($_POST['input-conmutador']);
$roomservice=clean($_POST['input-roomservice']);
$plantas2=clean($_POST['input-2plantas']);
$elevador=clean($_POST['input-elevador']);
$fraccpriv=clean($_POST['input-fraccpriv']);
$hidroneum=clean($_POST['input-hidroneum']);
$penthouse=clean($_POST['input-penthouse']);
$plantabaja=clean($_POST['input-plantabaja']);
$plantaelectrica=clean($_POST['input-plantaelectrica']);
$portero=clean($_POST['input-portero']);
$seguridad12=clean($_POST['input-seguridad12']);
$seguridad24=clean($_POST['input-seguridad24']);
$unaplanta=clean($_POST['input-unaplanta']);

$mascotas=clean($_POST['input-mascotas']);
$fumar=clean($_POST['input-fumar']);

$alberca=clean($_POST['input-alberca']);
$niños=clean($_POST['input-niños']);
$teniscancha=clean($_POST['input-teniscancha']);
$gimnasio=clean($_POST['input-gimnasio']);
$jacuzzi=clean($_POST['input-jacuzzi']);
$usos=clean($_POST['input-usos']);

$idcliente=$_SESSION['idcliente'];
//Subida de fotos
if (isset($_POST['guardar'])){

    // $_FILES['input-file'];
    $img_name=$_FILES['input-file']['name'];
    $img_size=$_FILES['input-file']['size'];
    $tmp_name=$_FILES['input-file']['tmp_name'];
    $error=$_FILES['input-file']['error'];


            //Query de INSERT serv exteriores
            $queryInsertSE="INSERT INTO servext(playa,balcon,cisterna,roof,easypark,playafrente,aguafrente,garaje,
            jardin,parrilla,patio,aspersion,roofgarden,terraza,vistagua,vistamar)
            VALUES
            ('$playa','$balcon','$cisterna','$roof','$easypark','$playafrente','$aguafrente','$garaje','$jardin',
            '$parrilla','$patio','$aspersion','$roofgarden','$terraza','$vistagua','$vistamar')";
            mysqli_query($conexion,$queryInsertSE);
            //Query de INSERT serv generales
            $queryInsertSG="INSERT INTO servgen(i18,discapacitados,aa,alarma,amueblado,bodega,calefaccion,chimenea,
            circuito,cocina,cocinaequipada,conmutador,roomservice,plantas2,elevador,fraccpriv,hidroneum,penthouse,
            plantabaja,plantaelectrica,portero,seguridad12,seguridad24,unaplanta)
            VALUES
            ('$i18','$discapacitados','$aa','$alarma','$amueblado','$bodega','$calefaccion','$chimenea','$circuito',
            '$cocina','$cocinaequipada','$conmutador','$roomservice','$plantas2','$elevador','$fraccpriv','$hidroneum',
            '$penthouse','$plantabaja','$plantaelectrica','$portero','$seguridad12','$seguridad24','$unaplanta')";
            mysqli_query($conexion,$queryInsertSG);
            //Query de INSERT serv recrea
            $queryInsertSR="INSERT INTO servrecrea(alberca,niños,teniscancha,gimnasio,jacuzzi,usos)
            VALUES
            ('$alberca','$niños','$teniscancha','$gimnasio','$jacuzzi','$usos')";
            mysqli_query($conexion,$queryInsertSR);
            //Query de INSERT restricciones
            $queryInsertRest="INSERT INTO restricciones(mascotas,fumar)
            VALUES
            ('$mascotas','$fumar')";
            mysqli_query($conexion,$queryInsertRest);

            //SELECT de checkboxes
            $querySelectSE="SELECT * FROM servext";
            $resultadoSSE=mysqli_query($conexion,$querySelectSE);

            if(mysqli_num_rows($resultadoSSE) > 0){
                while($row=mysqli_fetch_array($resultadoSSE)){
                    $_SESSION['idservext']=$row['idservext'];
                    $idservext=$_SESSION['idservext'];
                }
            }
            $querySelectSG="SELECT * FROM servgen";
            $resultadoSSG=mysqli_query($conexion,$querySelectSG);

            if(mysqli_num_rows($resultadoSSG) > 0){
                while($row=mysqli_fetch_array($resultadoSSG)){
                    $_SESSION['idservgen']=$row['idservgen'];
                    $idservgen=$_SESSION['idservgen'];
                }
            }
            $querySelectSR="SELECT * FROM servrecrea";
            $resultadoSSR=mysqli_query($conexion,$querySelectSR);

            if(mysqli_num_rows($resultadoSSR) > 0){
                while($row=mysqli_fetch_array($resultadoSSR)){
                    $_SESSION['idservrecrea']=$row['idservrecrea'];
                    $idservrecrea=$_SESSION['idservrecrea'];
                }
            }
            $querySelectRest="SELECT * FROM restricciones";
            $resultadoSR=mysqli_query($conexion,$querySelectRest);

            if(mysqli_num_rows($resultadoSR) > 0){
                while($row=mysqli_fetch_array($resultadoSR)){
                    $_SESSION['idrestric']=$row['idrestric'];
                    $idrestric=$_SESSION['idrestric'];
                }
            }
            //Query de INSERT propiedad
            $queryProp= "INSERT INTO inmueble(titulo,descripcion,precio,recamaras,
            baños,medios_baños,estacionamientos,construccion,terreno,largoter,anchoter,añoconst,
            numero_pisos,piso_ubicacion,clave,codigo,idpais,idestado,ciudad,calle,esquina,cp,idcliente,
            idop,idtipin,idservext,idservgen,idservrecrea,idrestric) 
            VALUES
            ('$titulo','$descripcion','$precio','$recamaras','$baños','$medbañ',
            '$estacionamientos','$construccion','$terreno','$largter','$anchoter','$anio','$pisos',
            '$pisoubi','$clave','$codigo','$pais','$estado','$ciudad','$calle','$esquina','$cp','$idcliente',
            '$tipop','$tipin','$idservext','$idservgen','$idservrecrea','$idrestric')";
                
            $resultadoProp = mysqli_query($conexion,$queryProp);  
            //Query de SELECT inmueble
            $querySelectInmueble="SELECT * FROM inmueble WHERE idcliente='$idcliente' ";
            $resultadoSelectInmueble=mysqli_query($conexion,$querySelectInmueble);

            if(mysqli_num_rows($resultadoSelectInmueble) > 0){
                while($row=mysqli_fetch_array($resultadoSelectInmueble)){
                    $_SESSION['idinm']=$row['idinm'];
                    $idinm=$_SESSION['idinm'];
                }
            }
            //Query de INSERT foto
            foreach($img_name as $key=>$val){
                $rand=rand('11111111','99999999');
                $file_name=$rand.'_'.$val;
                $img_upload_path='../../../img/casasIMG/'.$file_name;
                move_uploaded_file($tmp_name[$key],$img_upload_path);
                // echo $file_name;
                $queryInsertarFoto="INSERT INTO fotosProp (imagen,idinm) VALUES ('$file_name','$idinm')";
                mysqli_query($conexion,$queryInsertarFoto);
                
             
            }
            header("location: propiedades.php");

}else{
    header("Location: subir.php");
}
//form data <------ mas de 1 foto