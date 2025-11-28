<?php
    
    
    require_once '../core/231018libreriaValidacion.php';
    require_once '../config/confDB.php';

    $aErrores = [
        'CodUsuario' => '',
        'Password' => '',
    ];

    if(isset($_REQUEST['cancelar'])){
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    $entradaOK = true;
    if(isset($_REQUEST['iniciar'])){
        $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['nombre'], 80, 1, 1);
        $aErrores['Password'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['pass'], 8, 4, 1);

        //recorre el array de errores para detectar si hay alguno
        foreach ($aErrores as $campo => $valorCampo) {
            if ($valorCampo != null) {//Si encuentra algún error 
                $entradaOK = false; // la entrada no es correcta
            }
        }
    } else{
        $entradaOK = false;
    }

    if ($entradaOK) {
        //Rellenamos el array de respuesta con los valores que ha introducido el usuario

        try{
            $miDB = new PDO(DSN, USERNAME, PASSWORD);

            $sql = "SELECT T01_CodUsuario, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumConexiones FROM T01_Usuario WHERE T01_CodUsuario = :usuario AND T01_Password = sha2(:pass, 256)";
            $consultaPreparada = $miDB->prepare($sql);

            $consultaPreparada->execute([
                ':usuario' => $_REQUEST['nombre'],
                ':pass' => $_REQUEST['nombre'] . $_REQUEST['pass']
            ]);

            $aResultados = $consultaPreparada->fetch();
            
            if (!$aResultados) {
                $entradaOK = false;
            } else{
                session_start();
                
                $actualizacion = "UPDATE T01_Usuario SET T01_FechaHoraUltimaConexion = NOW(), T01_NumConexiones = T01_NumConexiones + 1 WHERE T01_CodUsuario = :usuario";
                $consultaPreparada2 = $miDB->prepare($actualizacion);
                $consultaPreparada2->execute([':usuario' => $_REQUEST['nombre']]);
                
                $datosActualizados = "SELECT T01_CodUsuario, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumConexiones FROM T01_Usuario WHERE T01_CodUsuario = :usuario";
                $consultaPreparada3 = $miDB->prepare($datosActualizados);

                $consultaPreparada3->execute([
                    ':usuario' => $_REQUEST['nombre']
                ]);
                
                $aResultados = $consultaPreparada3->fetch();
                $fechaUltimaConexion = $aResultados['T01_FechaHoraUltimaConexion'];
                $fechaActual = new DateTime('now', new DateTimeZone('Europe/Madrid'));
                $aSession = [
                    "CodUsuario" => $aResultados['T01_CodUsuario'],
                    "DescUsuario" => $aResultados['T01_DescUsuario'],
                    "FechaHoraUltimaConexion" => $fechaUltimaConexion,
                    "FechaHoraConexionActual" => $fechaActual,
                    "NumConexiones" => $aResultados['T01_NumConexiones']
                ];
                
                $_SESSION['usuarioALPDWESLoginLogoff'] = $aSession;
                header("Location: inicioPrivado.php");
                exit;
            }
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
                if(isset($_COOKIE['idioma'])){
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

