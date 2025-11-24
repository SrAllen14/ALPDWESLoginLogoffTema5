<html lang="es"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Indice general de la asignatura">
    <meta name="author" content="Álvaro Allén Perlines">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Álvaro Allén Perlines</title>
    <style>
        
        *{
            box-sizing: border-box;
            margin: 0 auto;
            padding: 0 auto;
        }
        
        body{
            width: 1920px;
            height: 1080px;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            align-items: center;
            text-align: center;
        }
        
        nav{
            display: flex;
            background-color: #456D96; 
            color: white;
            width: 100%;
            height: 10%;
            justify-items: left;
            text-align:left; 
        }
        
        /********/
        /* Banderas */
        
        #espana{
            width: 20px;
            height: 20px;
            background-image: url("https://flagcdn.com/es.svg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        
        #portugal{
            width: 20px;
            height: 20px;
            background-image: url("https://flagcdn.com/pt.svg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        
        #francia{
            width: 20px;
            height: 20px;
            background-image: url("https://flagcdn.com/fr.svg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        /********/
        
        table.bd{
            width: 400px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
        }
        
        div.tabla2{
            margin:10px auto 10px auto;
            padding: 10px;
            width: 1500px;
            
            border-radius: 20px;
            background-color: white; 
        }
        
        table.ejer{
            width: 1400px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            
        }
        
        .principal{
            font-weight: bold;
            text-align: center;
        }
        
        td{
            height: auto;
            width: auto;
            border: 1px solid gray;
        }
        
        .imagen{
            height: 50px;
            width: 50px;
        }
        
        .ejer td:nth-of-type(1){
            width: 50px;
            text-align: center;
        }
        
        footer{
            margin: auto;
            background-color: #456d96;
            text-align: center;
            align-content: center;
            height: 10%;
	    color: white;
            
            & a{
               text-decoration: none; 
            }
        }
                
        i{
            width: 10px;
            height: 10px;
            color: white;
        }
        

    </style>
</head>
<body>
    <nav>
        <h2 class="tituloProyecto">Log In - Log Off Tema 5</h2>
        <h2 class="tituloPagina">Inicio Público</h2>
        <form method="post">
            <button type="submit" name="francia" id="francia"></button>
            <button type="submit" name="portugal" id="portugal"></button>
            <button type="submit" name="espana" id="espana"></button>
            <button type="submit" name="login" id="login">Login</button>
        </form>
    </nav>
    <main>
        <div class="tabla2">
            <?php
                if(isset($_REQUEST['login'])){
                    header("location: codigoPHP/vLogin.php");
                    exit;
                }
                if(isset($_REQUEST['espana'])){
                    setcookie("idioma", "ES", time()+20000002);
                }
                if(isset($_REQUEST['francia'])){
                    setcookie("idioma", "FR", time()+20000002);
                }
                if(isset($_REQUEST['portugal'])){
                    setcookie("idioma", "PT", time()+20000002);
                }
            ?>
        </div>
    </main>
    <footer>
        <div>
            <a href="/index.html">
           Álvaro Allén Perlines
            </a>
            <time datetime="2025-11-20">20-11-2025</time>
            <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master" target="blank"><i class="fa-brands fa-github fa-2x"></i></a>
        </div>
    </footer>
</body>
</html>