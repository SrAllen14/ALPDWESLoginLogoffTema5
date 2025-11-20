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
            background-color: #456D96; 
            color: white;
            width: 100%;
            height: 96px;
            align-content: center;
        } 
        
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
        
        img{
            width: 50px;
            height: 50px;
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
        <h2>Inicio Privado</h2>
        <form>
            <button type="submit" name="cerrarS" id="cerrarS">Cerrar sesión</button>
        </form>
    </nav>
    <main>
        <div class="tabla2">
            <?php
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
    </main>
    <footer>
        <div>
            <a href="../indexProyectoTema5.php">
           Álvaro Allén Perlines
            </a>
            <time datetime="2025-11-20">20-11-2025</time>
            <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master" target="blank"><i class="fa-brands fa-github fa-2x"></i></a>
        </div>
    </footer>
</body>
</html>