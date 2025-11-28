<?php
    if(isset($_REQUEST['login'])){
        header("location: codigoPHP/login.php");
        exit;
    }
    
    if(!isset($_COOKIE['idioma'])){
        setcookie("idioma", "ES", time()+604.800);
        header('Location: ./indexLoginLogoffTema5.php');
        exit;
    } 
    
    if(isset($_REQUEST['idioma'])){
        setcookie("idioma", $_REQUEST['idioma'], time()+604.800); // caducidad 1 semana
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
                <button type="submit" name="idioma" id="francia" value="FR"><?php if($_COOKIE['idioma']==='FR'){echo "\u{2714}";}?></button>
                <button type="submit" name="idioma" id="portugal" value="PT"><?php if($_COOKIE['idioma']==='PT'){echo "\u{2714}";}?></button>
                <button type="submit" name="idioma" id="espana" value="ES"><?php if($_COOKIE['idioma']==='ES'){echo "\u{2714}";}?></button>
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