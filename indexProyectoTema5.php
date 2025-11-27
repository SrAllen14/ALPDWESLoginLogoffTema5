<?php
    if(isset($_REQUEST['login'])){
        header("location: codigoPHP/vLogin.php");
        exit;
    }
    
    if(!isset($_COOKIE['idioma'])){
        setcookie("idioma", "ES", time()+20000002);
    }
    
    if(isset($_REQUEST['espana'])){
        setcookie("idioma", "ES", time()+20000002);
        header('Location: ./indexProyectoTema5.php');
        exit;
        
    }
    if(isset($_REQUEST['francia'])){
        setcookie("idioma", "FR", time()+20000002);
        header('Location: ./indexProyectoTema5.php');
        exit;
    }
    if(isset($_REQUEST['portugal'])){
        setcookie("idioma", "PT", time()+20000002);
        header('Location: ./indexProyectoTema5.php');
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
                <button type="submit" name="francia" id="francia"><?php if($_COOKIE['idioma']==='FR'){echo "\u{2714}";}?></button>
                <button type="submit" name="portugal" id="portugal"><?php if($_COOKIE['idioma']==='PT'){echo "\u{2714}";}?></button>
                <button type="submit" name="espana" id="espana"><?php if($_COOKIE['idioma']==='ES'){echo "\u{2714}";}?></button>
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
            <time>2025-11-24</time>
        </div>
        <div class="pie2">
            <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master" target="blank"><i class="fab fa-github"></i></a>
        </div>
    </footer>
</body>
</html>