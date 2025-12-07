<?php
/*
 * @author: Álvaro Allén Perlines
 * @since: 05/12/2025
 * Página inicial del proyecto login - logoff.
 * En esta página nos encontramos un indexPrincipal con la posibilidad de escoger el idioma
 * y acceder a la página del formulario de login.
 */

    // Comprobamos que el botón login ha sido pulsado.
    if(isset($_REQUEST['login'])){
        // En caso de que haya sido pulsado nos dirigimos a la página del formulario de login.
        header("location: codigoPHP/login.php");
        exit;
    }
    
    // Comprobamos que existe al cookie "idioma".
    if(!isset($_COOKIE['idioma'])){
        // En caso de que no exista la creamos con el valor predefinido de ES para que el contenido de nuestra aplicación esté en español.
        setcookie("idioma", "ES", time()+604.800);
        // Recargamos la página para que la cookie sea guardada por el navegador.
        header('Location: ./indexLoginLogoffTema5.php');
        exit;
    } 
    
    // Comprobamos que alguno de los botones de idioma ha sido pulsado.
    if(isset($_REQUEST['idioma'])){
        // En caso de haber sido pulsado, creamos la cookie idioma (en caso de existir, su valor se modificará) y le introducimos el valor dependiendo del idioma escogido.
        setcookie("idioma", $_REQUEST['idioma'], time()+604.800); // caducidad 1 semana
        // Recargamos la página para que la cookie sea guardada por el navegador.
        header('Location: ./indexLoginLogoffTema5.php');
        exit;
    }
    
    
?>

<html lang="es"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Indice general de la asignatura">
    <meta name="author" content="Álvaro Allén Perlines">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="webroot/estilos/estilos.css"/>
    <link rel="stylesheet" href="webroot/estilos/banderas.css"/>
    <link rel="stylesheet" href="webroot/estilos/estilosFormulario.css"/>
    <title>Álvaro Allén Perlines</title>
</head>
<body>
    <header>
        <div class="cabecera1">
            <h2>Log In - Log Off Tema 5</h2>
        </div>
        <div class="cabecera2">
            <h2>Página de inicio</h2>
        </div>
        <div class="cabecera3">
            <form method="post">
                <button type="submit" name="idioma" id="francia" value="FR"><?php /* En caso de que la cookie sea FR el boton será marcado con una cruz */ if($_COOKIE['idioma']==='FR'){echo "\u{2714}";}?></button>
                <button type="submit" name="idioma" id="portugal" value="PT"><?php /* En caso de que la cookie sea PT el boton será marcado con una cruz */ if($_COOKIE['idioma']==='PT'){echo "\u{2714}";}?></button>
                <button type="submit" name="idioma" id="espana" value="ES"><?php /* En caso de que la cookie sea ES el boton será marcado con una cruz */ if($_COOKIE['idioma']==='ES'){echo "\u{2714}";}?></button>
                <button type="submit" name="login" id="login">Login</button>
            </form>
        </div>
    </header>
    <main>
        <div class="container">
            
        </div>
    </main>
    <footer>
        <div class="pie1">
            <a href="../index.html">Álvaro Allén Perlines</a>
            <time>2025-12-05</time>
        </div>
        <div class="pie2">
            <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master" target="blank"><i class="fab fa-github"></i></a>
        </div>
    </footer>
</body>
</html>