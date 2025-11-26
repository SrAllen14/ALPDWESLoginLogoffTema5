<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../indexProyectoTema5.php');
        exit;
    }
    if($_COOKIE["idioma"]==="ES"){
        $fecha = new DateTime($_SESSION['ultimaConexion'], new DateTimeZone('Europe/Madrid'));

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
        $fecha = new DateTime($_SESSION['ultimaConexion'], new DateTimeZone('Europe/Paris'));
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
        $fecha = new DateTime($_SESSION['ultimaConexion'], new DateTimeZone('Europe/Lisbon'));
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
                    if($_COOKIE["idioma"]==="ES"){echo '<img src="https://flagcdn.com/es.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="FR"){echo '<img src="https://flagcdn.com/fr.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="PT"){echo '<img src="https://flagcdn.com/pt.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]===""){echo '<p>Idioma no escogido</p>';}
                ?>
                <button type="submit" name="cerrarS" id="cerrarS">Cerrar Sesión</button>
            </form>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="formulario">
                <?php
                    if($_COOKIE["idioma"]==="ES"){echo "<h2>Bienvenido ".$_SESSION['descripcion']."<br> Esta es la ".$_SESSION['numConexiones']." vez que se conecta.<br>Usted se conectó por última vez el ".$fechaFormateada."</h2>";}
                    if($_COOKIE["idioma"]==="FR"){echo "<h2>Bienvenue ".$_SESSION['descripcion']."<br> C´est le ".$_SESSION['numConexiones']." fois que vous vous connectez.<br>Vous vous êtes connecté pour la dernière fois le ".$fechaFormateada."</h2>";}
                    if($_COOKIE["idioma"]==="PT"){echo "<h2>Bem-vindo ".$_SESSION['descripcion']."<br> Esta é a ".$_SESSION['numConexiones']." vez que se conecta.<br>Você conectou-se pela última vez em ".$fechaFormateada."</h2>";}
                    if(isset($_REQUEST['detalles'])){
                        header("location: vDetalle.php");
                        exit;
                    }
                    if(isset($_REQUEST['cerrarS'])){
                        header("location: ../indexProyectoTema5.php");
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
            <a href="../index.html">Álvaro Allén Perlines</a>
            <time>2025-11-26</time>
        </div>
        <div class="pie2">
            <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master" target="blank"><i class="fab fa-github"></i></a>
        </div>
    </footer>
</body>
</html>