<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="../../css/estilos.css"/>
    <script defer src="../../js/scriptsLogin/scriptEmptyFields.js"></script>
</head>
<body>
    <main>
        <div class="contenedor_todo">      
            <!-- Cajas -->
            <div class="caja_trasera">
                <div class="caja_trasera_login">
                    <h3>Ya tienes cuenta?</h3>
                    <p>Inicia sesion para logearte</p>
                    <button id="btnCaTrLo">Iniciar sesion</button>
                </div>

                <div class="caja_trasera_register">
                    <h3 class="cuenta">¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesion</p>
                    <button id="btnCaTrRe">Registrarse</button>
                </div>       
            </div>           
            <!-- Formularios -->
            <div class="contenedor_login_register"> 
                <?php
                    
                    if(isset($_SESSION['usermail'])){
                        header("location: ../../index.php");
                    }
                ?>
                <form action="loginClient.php" method="POST" class="formulario_login">
                    <h2>Iniciar Sesion</h2>
                    <input required type="text" placeholder="Correo" name="loginCorreo" maxlength="80">
                    <input required type="password" placeholder="Contraseña" name="loginPassword" maxlength="10">
                    <div class="divBtnFoLo">
                        <button id="btnFoLo"> Entrar </button>
                    </div>
                    <br>
                    <?php if(isset($_GET['registroValido'])){
                        ?>
                        <script src="../../js/scriptsLogin/mostrarLo.js"></script>
                        <a class="aExito">¡Usuario registrado exitosamente!</a>
                        <?php
                    }?>
                    <?php if(isset($_GET['errorLogin'])){
                        ?>
                        <script src="../../js/scriptsLogin/mostrarLo.js"></script>
                        <a class="aFallo">¡Correo o contraseña incorrectas!</a>
                        <?php
                    }?>
                </form>

                <form id="formRegister" action="registerClient.php" method="POST" class="formulario_register">
                    <!-- Formulario que contiene las input -->
                    <h2>Registrarse</h2>
                    <div>
                        <!-- Div que contienen los input -->
                        <input required type="text" placeholder="Nombre(s):" class="registerNombreClass" name="registerNombres" maxlength="80">
                        <!-- input para nombre -->
                        <input required type="text" placeholder="Apellido(s):" class="registerApellidoClass" name="registerApellidos" maxlength="100">
                        <!-- input para apellido -->
                        <input required id="inputCorreoRe" type="text" placeholder="Correo:" class="registerCorreoClass" name="registerCorreo" maxlength="80">
                        <!-- input para correo -->
                        <input required id="inputPasswordRe" type="password" placeholder="Contraseña:" class="registerPasswordClass" name="registerPassword" maxlength="10">
                        <!-- input para contraseñaD -->
                    </div>
                    <br>
                    <h4>¿Qué desea hacer?</h4>
                    <br>
                    <select name= "selectRol">
                        <?php
                            //Creacion de conexion
                            function conectarDB() : mysqli {
                            $conexion = mysqli_connect('localhost', 'root', '', 'bdimmo1');
                            return $conexion;
                            }
                            
                            $conexion= conectarDB(); 
                            $sql='SELECT * FROM rolclt';
                            $query=mysqli_query($conexion,$sql);
                            
                            while($row=mysqli_fetch_array($query)){
                                $idrolclt=$row['idrolclt'];
                                $descripcion=$row['descripcion'];

                                if($idrolclt==3 || $idrolclt==4){
                        ?>
                        <option value="<?php echo $idrolclt ?>"><?php echo $descripcion?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <br>
                    <a class="aFallo" id="error"></a>
                    <div class="divBtnFoRe">
                        <button id="btnFoRe"> Registrarse </button>
                    </div>
                    <br>
                    <?php if(isset($_GET['errorCorreo'])){
                    ?>
                        <script src="../../js/scriptsLogin/mostrarRe.js"></script>
                        <div class="divErrores1">
                            <a class="aFallo">El correo ya ha sido utilizado con anterioridad.</a>
                            <br>
                            <a class="aFallo">Inicia sesion para continuar.</a>
                        </div>
                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>
    </main>
    <script src="../../js/scriptsLogin/script.js"></script>
    <!--<script src="js/scriptEmptyFields.js"></script>-->
</body>
</html>
