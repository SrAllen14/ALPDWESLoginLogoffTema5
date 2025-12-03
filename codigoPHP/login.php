<?php
    /*
     * Página de formulario para indentificarse como usuario existente.
     * En esta página nos encontramos: 
     *  Un formulario con dos campos: usuario y contraseña
     *  Un botón de cancelar que nos devuelve al index inicial del proyecto.
     *  Un botón de entrar que, en caso de introducir los valores correspondientes, nos dará acceso a la siguiente página de inicio privado.
     *  En la esquina superior una imagen con la bandear del idioma establecido.
     */
    
    // Importamos las librerías correspondientes y el archivo de configuración correspondiente con los datos para acceder a la base de datos.
    require_once '../core/231018libreriaValidacion.php';
    require_once '../config/confDB.php';

    // Para realizar la validación de campos creamos un array que guardará los errores cometidos en cada campo.
    $aErrores = [
        'CodUsuario' => '',
        'Password' => '',
    ];

    // Comprueba que el botón de "cancelar" ha sido pulsado.
    if(isset($_REQUEST['cancelar'])){
        // En caso de haber pulsado el botón de cancelar nos dirigimos a la página del index inicial.
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    
    // Definimos la variable booleana como verdadera.
    $entradaOK = true;
    
    // Comprueba que el botón "iniciar" ha sido pulsado.
    if(isset($_REQUEST['iniciar'])){
        // Validamos la entrada de los campos. En caso de haber un error este se guardará en su respectivo campo del array $aErrores.
        $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['nombre'], 80, 1, 1);
        $aErrores['Password'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['pass'], 8, 4, 1);

        //recorre el array de errores para detectar si hay alguno
        foreach ($aErrores as $campo => $valorCampo) {
            if ($valorCampo != null) {//Si encuentra algún error 
                $entradaOK = false; // la entrada no es correcta
            }
        }
    } else{
        // En caso de no haber pulsado el botón "iniciar" la entrada no será valida.
        $entradaOK = false;
    }

    // Comprobamos el valor de la variable booleana $entradaOk.
    if ($entradaOK) {
        // En caso de que la entrada sea valida. $entradaOk = true.
        try{
            // Realizamos la conexión con la base de datos creando un objeto de la clase PDO con los valores guardados del archivo de configuración importado.
            $miDB = new PDO(DSN, USERNAME, PASSWORD);

            // Creamos la consulta preparada definiendo una variable con la consulta sql.
            $sql = "SELECT T01_CodUsuario, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumConexiones FROM T01_Usuario WHERE T01_CodUsuario = :usuario AND T01_Password = sha2(:pass, 256)";
            $consultaPreparada = $miDB->prepare($sql);

            // Ejecutamos la consulta sql con los valores introducidos en cada campo.
            $consultaPreparada->execute([
                ':usuario' => $_REQUEST['nombre'],
                ':pass' => $_REQUEST['nombre'] . $_REQUEST['pass']
            ]);

            // Guardamos el resultado de la consulta en un array.
            $aResultados = $consultaPreparada->fetch();
            
            // Comprobamos si el array que guarda los resultados de la consulta está vacio.
            if (!$aResultados) {
                // Si está vacio cambiamos el valor de la variable booleana a false.
                $entradaOK = false;
            } else{
                // En caso de que no este vacio, significa que ha encontrado un usuario con dicho nombre y su contraseña es correcta.
                // Iniciamos la sesión para no tener que introducir los datos de sesión mientras el navegador este abierto.
                session_start();
                
                // Realizamos una consulta de actualización sql cambiando la hora de la última conexión por la actual y aumentando el campo de número de conexiones.
                // Es necesario filtrar el usuario ya que, en caso de no hacerlo, cambiariamos los campos de todos los usuarios.
                $actualizacion = "UPDATE T01_Usuario SET T01_FechaHoraUltimaConexion = NOW(), T01_NumConexiones = T01_NumConexiones + 1 WHERE T01_CodUsuario = :usuario";
                $consultaPreparada2 = $miDB->prepare($actualizacion);
                
                // Realizamos la consulta usando el valor introducido en el campo usuario. 
                // Como la condición para hacer estos pasos es que el usuario exista, ya hemos comprobado que este usuario es valido.
                $consultaPreparada2->execute([':usuario' => $_REQUEST['nombre']]);
                
                // Realizamos la consulta con los nuevos datos del usuario para usarlos en la creación de la sesión.
                $datosActualizados = "SELECT T01_CodUsuario, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumConexiones FROM T01_Usuario WHERE T01_CodUsuario = :usuario";
                $consultaPreparada3 = $miDB->prepare($datosActualizados);

                $consultaPreparada3->execute([
                    ':usuario' => $_REQUEST['nombre']
                ]);
                
                $aResultados2 = $consultaPreparada3->fetch();
                $fechaUltimaConexion = $aResultados['T01_FechaHoraUltimaConexion'];
                $fechaActual = new DateTime('now', new DateTimeZone('Europe/Madrid'));
                
                // Creamos el array sesión con los valores actualizados de la tabla del usuario.
                $aSession = [
                    "CodUsuario" => $aResultados2['T01_CodUsuario'],
                    "DescUsuario" => $aResultados2['T01_DescUsuario'],
                    "FechaHoraUltimaConexion" => $fechaUltimaConexion,
                    "FechaHoraConexionActual" => $fechaActual,
                    "NumConexiones" => $aResultados2['T01_NumConexiones']
                ];
                
                // Creamos la sesión usando la variable superglobal $_SESSION definiendola con el array de sesión.
                $_SESSION['usuarioALPDWESLoginLogoff'] = $aSession;
                // Nos dirigimos a la página de inicio privado de nuestra aplicación.
                header("Location: inicioPrivado.php");
                exit;
            }
            // En caso de lanzar una expcepción mostramos un mensaje de error.
        } catch(PDOException $exPDO){
            echo "Error: ".$exPDO->getMessage();
            exit;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login-Logoff</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
        <link rel="stylesheet" href="../webroot/estilos/estilos.css"/>
        <link rel="stylesheet" href="../webroot/estilos/estilosFormulario.css"/>
    </head>
    <body>
        <header>
            <div class="cabecera1">
                <h2>Log in-Log off Tema 5</h2>
            </div>
            <div class="cabecera2">
                <h2>Login</h2>
            </div>
            <div class="cabecera3">
                <?php
                // Comprobamos que la cookie "idioma" esta definida.
                if(isset($_COOKIE['idioma'])){
                    // Comprobamos que el valor de la cookie "idioma" es alguno de los tres idiomas y mostramos la bandera correspondiente.
                    if($_COOKIE["idioma"]==="ES"){echo '<img src="https://flagcdn.com/es.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="FR"){echo '<img src="https://flagcdn.com/fr.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="PT"){echo '<img src="https://flagcdn.com/pt.svg" alt="imagen" width="20" height="20">';}
                } 
                ?>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="formulario">
                    <form method="post" action="/ALPDWESLoginLogoffTema5/codigoPHP/login.php">
                        <h1>Inicio de sesión</h1>
                        <input class="obligatorio" name="nombre" id="nombre" type="text" placeholder="Usuario..."><br><br>
                        <input class='obligatorio' name="pass" id="pass" type="password" placeholder="Contraseña..."><br><br>
                        <button type="submit" name="registrar" id="registrar">Registrarse</button>
                        <button type="submit" name="iniciar" id="iniciar">Entrar</button>
                        <button type="submit" name="cancelar" id="cancelar">Cancelar</button>
                    </form>
                </div>

            </div>
        </main>
        <footer>
            <div class="pie1">
                <a href="../indexProyectoTema5.php">Álvaro Allén Perlines</a>
                <time>2025-11-25</time>
            </div>
            <div class="pie3">
                <a href="https://elpais.com/subscriptions/#/sign-in?prod=REG&o=CABEP&prm=login_cabecera_el-pais&backURL=https%3A%2F%2Felpais.com" target="blank">Página imitada</a>
            </div>
            <div class="pie2">
                <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master"><i class="fab fa-github"></i></a>
            </div>
        </footer>
    </body>
</html>

