<?php
/*
 * @author: Álvaro Allén Perlines
 * @since: 05/12/2025
 * Página de inicio privado de la aplicación.
 * En esta página encontraremos:
 *  En la esquina superior derecha una bandera con el idioma establecido.
 *  En la esquina superior derecha un botón de cierre de sesión el cual nos dirige a la página inicial del proyecto y elimina la sesión.
 *  En el centro de la página un texto en el idioma establecido con un formato concreto.
 *  Debajo del texto un botón de detalles que nos dirige a la página de detalles.
 */

    // Iniciamos la sesión.
    session_start();
    
    // Comprobamos que la sesión no está iniciada (no existe o no está definida).
    if(!isset($_SESSION['usuarioALPDWESLoginLogoff'])){
        // En caso de que no esté definida, nos dirigimos a la página de login.
        header('Location: login.php');
        exit;
    }
    
    // Comprobamos que existe la cookie idioma "idioma".
    if(isset($_COOKIE["idioma"])){
        // Comprobamos que la cookie "idioma" tiene un valor específico.
        // Con esto formateamos las fechas de última conexión según el idioma establecido.
        if($_COOKIE["idioma"]==="ES"){
            $fecha = new DateTime($_SESSION['usuarioALPDWESLoginLogoff']['FechaHoraUltimaConexion'], new DateTimeZone('Europe/Madrid'));

            $fmt = new IntlDateFormatter(
                'es_ES',                     // Locale en portugués
                IntlDateFormatter::FULL,     // Formato completo del día
                IntlDateFormatter::SHORT,    // Formato de hora
                'Europe/Madrid',             // Timezone
                IntlDateFormatter::GREGORIAN,
                "EEEE d 'de' MMMM 'de' yyyy 'a las' HH:mm"  // Formato personalizado
            );
            $fechaFormateada = $fmt->format($fecha);
        }

        if($_COOKIE["idioma"]==="FR"){
            $fecha = new DateTime($_SESSION['usuarioALPDWESLoginLogoff']['FechaHoraUltimaConexion'], new DateTimeZone('Europe/Paris'));
            $fmt = new IntlDateFormatter(
                'fr_FR',                     // Locale en portugués
                IntlDateFormatter::FULL,     // Formato completo del día
                IntlDateFormatter::SHORT,    // Formato de hora
                'Europe/Paris',             // Timezone
                IntlDateFormatter::GREGORIAN,
                "EEEE d  MMMM  yyyy 'à' HH:mm"  // Formato personalizado
            );
            $fechaFormateada = $fmt->format($fecha);
        }

        if($_COOKIE["idioma"]==="PT"){
            $fecha = new DateTime($_SESSION['usuarioALPDWESLoginLogoff']['FechaHoraUltimaConexion'], new DateTimeZone('Europe/Lisbon'));
            $fmt = new IntlDateFormatter(
                'pt_PT',                     // Locale en portugués
                IntlDateFormatter::FULL,     // Formato completo del día
                IntlDateFormatter::SHORT,    // Formato de hora
                'Europe/Lisbon',             // Timezone
                IntlDateFormatter::GREGORIAN,
                "EEEE d 'de' MMMM 'de' yyyy 'às' HH:mm"  // Formato personalizado
            );
            $fechaFormateada = $fmt->format($fecha);
        }
    } else{
        // En caso de que no exista la creamos con el valor predefinido de ES para que el contenido de nuestra aplicación esté en español.
        setcookie("idioma", "ES", time()+604.800);
        // Recargamos la página para que la cookie sea guardada por el navegador.
        header('Location: inicioPrivado.php');
        exit;
    }   
?>

<html lang="es"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Indice general de la asignatura">
    <meta name="author" content="Álvaro Allén Perlines">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../webroot/estilos/estilos.css"/>
    <link rel="stylesheet" href="../webroot/estilos/banderas.css"/>
    <link rel="stylesheet" href="../webroot/estilos/estilosFormulario.css"/>
    <title>Álvaro Allén Perlines</title>
</head>
<body>
    <header>
        <div class="cabecera1">
            <h2>Log In - Log Off Tema 5</h2>
        </div>
        <div class="cabecera2">
            <h2>Inicio privado</h2>
        </div>
        <div class="cabecera3">
            <form method="post">
                <?php
                    if(isset($_COOKIE["idioma"])){
                        if($_COOKIE["idioma"]==="ES"){
                            echo '<img src="https://flagcdn.com/es.svg" alt="imagen" width="20" height="20">'; 
                        }
                        if($_COOKIE["idioma"]==="FR"){echo '<img src="https://flagcdn.com/fr.svg" alt="imagen" width="20" height="20">';}
                        if($_COOKIE["idioma"]==="PT"){echo '<img src="https://flagcdn.com/pt.svg" alt="imagen" width="20" height="20">';}
                    }
                    
                ?>
                <button type="submit" name="cerrarS" id="cerrarS">Cerrar Sesión</button>
            </form>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="formulario">
                <?php
                    // Comprobamos que existe y está definida la cookie idioma.
                    if(isset($_COOKIE["idioma"])){
                        // Comprobamos si es la primera vez que se inicia sesión con el usuario.
                        // Dependiendo de esa condición el mensaje se mostrará de una forma u otra.
                        if(!empty($_SESSION['usuarioALPDWESLoginLogoff']['FechaHoraUltimaConexion'])){
                            if($_COOKIE["idioma"]==="ES"){echo "<h2>Bienvenido ".$_SESSION['usuarioALPDWESLoginLogoff']['DescUsuario']."<br> Esta es la ".$_SESSION['usuarioALPDWESLoginLogoff']['NumConexiones']." vez que se conecta.<br>Usted se conectó por última vez el ".$fechaFormateada."</h2>";}
                            if($_COOKIE["idioma"]==="FR"){echo "<h2>Bienvenue ".$_SESSION['usuarioALPDWESLoginLogoff']['DescUsuario']."<br> C´est le ".$_SESSION['usuarioALPDWESLoginLogoff']['NumConexiones']." fois que vous vous connectez.<br>Vous vous êtes connecté pour la dernière fois le ".$fechaFormateada."</h2>";}
                            if($_COOKIE["idioma"]==="PT"){echo "<h2>Bem-vindo ".$_SESSION['usuarioALPDWESLoginLogoff']['DescUsuario']."<br> Esta é a ".$_SESSION['usuarioALPDWESLoginLogoff']['NumConexiones']." vez que se conecta.<br>Você conectou-se pela última vez em ".$fechaFormateada."</h2>";}
                        } else{
                            if($_COOKIE["idioma"]==="ES"){echo "<h2>Bienvenido ".$_SESSION['usuarioALPDWESLoginLogoff']['DescUsuario']."<br> Esta es la ".$_SESSION['usuarioALPDWESLoginLogoff']['NumConexiones']." vez que se conecta.</h2>";}
                            if($_COOKIE["idioma"]==="FR"){echo "<h2>Bienvenue ".$_SESSION['usuarioALPDWESLoginLogoff']['DescUsuario']."<br> C´est le ".$_SESSION['usuarioALPDWESLoginLogoff']['NumConexiones']." fois que vous vous connectez.</h2>";}
                            if($_COOKIE["idioma"]==="PT"){echo "<h2>Bem-vindo ".$_SESSION['usuarioALPDWESLoginLogoff']['DescUsuario']."<br> Esta é a ".$_SESSION['usuarioALPDWESLoginLogoff']['NumConexiones']." vez que se conecta.</h2>";}
                        }
                    }
                        
                    
                    // Comprobamos que el botón "detalles" ha sido pulsado.
                    if(isset($_REQUEST['detalles'])){
                        // Nos dirigimos a la página de detalles de la aplicación.
                        header("location: detalle.php");
                        exit;
                    }
                    
                    // Comprobamos que el botón "cerrarS" ha sido pulsado.
                    if(isset($_REQUEST['cerrarS'])){
                        // Cerramos la sesión (borramos el campo de la variable superglobal).
                        session_unset();
                        // Nos dirigimos a la página principal de la aplicación.
                        header("location: ../indexLoginLogoffTema5.php");
                        exit;
                    }
                ?>
                <form>
                    <button type="submit" name="detalles" id="detalles">Detalles</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="pie1">
            <a href="../indexProyectoTema5.php">Álvaro Allén Perlines</a>
            <time>2025-12-05</time>
        </div>
        <div class="pie2">
            <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master" target="blank"><i class="fab fa-github"></i></a>
        </div>
    </footer>
</body>
</html>