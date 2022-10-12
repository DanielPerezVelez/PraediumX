<?php
session_start();
$rol=$_SESSION['rol'];
include '../../../templates/headerVendedor.php';
include '../../crud.php';
?>
<div class="container h-100">
<h1>Crear Propiedad.</h1>

    <form>
        <div class="div-opciones">

            <div class="div-a">
                <a>Tipo de propiedad</a>
                <div class="div-input">
                    <select>
                        <?php
                            $conexion= conectarDB(); 
                            $sql='SELECT * FROM tipin';
                            $query=mysqli_query($conexion,$sql);
                            
                            while($row=mysqli_fetch_array($query)){
                                $idtipin=$row['idtipin'];
                                $tipo=$row['tipo'];          
                        ?>
                        <option value="<?php echo $idtipin ?>"><?php echo $tipo?></option>
                        <?php          
                            }
                        ?>
                    </select>
                </div>               
            </div>
            <div class="div-a">
                <a>Título del anuncio</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Descripción del anuncio</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Precio</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Tipo de operación</a>
                <div class="div-input">
                    <select>
                        <?php
                            $conexion= conectarDB(); 
                            $sqlOp='SELECT * FROM operacion';
                            $queryOp=mysqli_query($conexion,$sqlOp);
                            
                            while($row=mysqli_fetch_array($queryOp)){
                                $idop=$row['idop'];
                                $tipo=$row['tipo'];
                                if($idop==1 || $idop==2){          
                        ?>
                        <option value="<?php echo $idtipin ?>"><?php echo $tipo?></option>
                        <?php 
                                }         
                            }
                        ?>
                    </select>
                </div>               
            </div>
            <div class="div-a">
                <a>Recámaras</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Baños</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Medios baños</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Estacionamientos</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Construcción</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Terreno</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Largo del terreno</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Ancho del terreno</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Año de construcción</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Piso ubicado</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Número de pisos del edificio</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Clave interna</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Código de llave</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <br><br>

            <h2> Ubicación </h2>

            <div class="div-a">
                <a>País</a>
                <div class="div-input">
                    <select></select>
                </div>               
            </div>
            <div class="div-a">
                <a>Estado</a>
                <div class="div-input">
                    <select></select>
                </div>               
            </div>
            <div class="div-a">
                <a>Ciudad/Delegación</a>
                <div class="div-input">
                    <select></select>
                </div>               
            </div>
            <div class="div-a">
                <a>Calle</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Esquina</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <div class="div-a">
                <a>Código postal</a>
                <div class="div-input">
                    <input></input>
                </div>               
            </div>
            <br><br>

            <h2>Características de la propiedad</h2>

            <div class="div-b">
                <h4>Exterior</h4>
                <div class="container-checkbox">
                    <div>
                        <a>Acceso a playa</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Balcón</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Cisterna</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Estacionamiento techado</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Facilidad para estacionarse</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Frente a la playa</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Frente al agua</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Garaje</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Jardín</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Parrilla</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Patio</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Riego por aspersión</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>        
            </div>

            <div class="div-b">
                <h4>General</h4>
                <div class="container-checkbox">
                    <div>
                        <a>Accesibilidad para adultos mayores</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Accesibilidad para personas con discapacidad</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Aire acondicionado</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Alarma</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Amueblado</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Bodega</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Calefacción</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Chimenea</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Circuito cerrado</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Cocina</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>   
                <div class="container-checkbox">
                    <div>
                        <a>Cocina equipada</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Conmutador</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Cuarto de servicio</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Dos plantas</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Elevador</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Fraccionamiento privado</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Hidroneumático</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Mascotas permitias</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Penthouse</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Planta baja</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Planta eléctrica</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Portero</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Seguridad 12 horas</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Seguridad 24 horas</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Una sola planta</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
            </div>

            <div class="div-b">
                <h4>Políticas</h4>
                <div class="container-checkbox">
                    <div>
                        <a>Se aceptan mascotas</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Prohibido fumar</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>                 
            </div>

            <div class="div-b">
                <h4>Recreación</h4>
                <div class="container-checkbox">
                    <div>
                        <a>Alberca</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Área de juegos infantiles</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div> 
                <div class="container-checkbox">
                    <div>
                        <a>Cancha de tenis</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>    
                <div class="container-checkbox">
                    <div>
                        <a>Gimnasio</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>
                <div class="container-checkbox">
                    <div>
                        <a>Jacuzzi</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>  
                <div class="container-checkbox">
                    <div>
                        <a>Salón de usos múltiples</a>
                    </div>
                    <div class="div-checkbox">
                        <input type="checkbox"></input>
                    </div>
                </div>           
            </div>

        </div>
    </form>
</div>
<?php
include '../../../templates/footer.php';
?>