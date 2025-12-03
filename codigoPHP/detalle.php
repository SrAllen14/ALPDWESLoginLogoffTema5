<?php
/*
 * Página de detalle de sesión de la aplicación.
 * En esta página encontraremos:
 *  Tres tablas cada una con el contenido de las variables superglobales:
 *  $_SESSION
 *  $_COOKIE
 *  $_SERVER
 */

    // Iniciamos la sesión.
    session_start();
    
    // Comprobamso que la sesión no está iniciada (no existe o no está definida).
    if(!isset($_SESSION['usuarioALPDWESLoginLogoff'])){
        // En caso de que no esté definida, nos dirigimos a la página de login.
        header('Location: login.php');
        exit;
    }
?>
<html lang="es"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Indice general de la asignatura">
    <meta name="author" content="Álvaro Allén Perlines">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../webroot/estilos/banderas.css"/>
    <title>Álvaro Allén Perlines</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body{
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            align-items: center;
            text-align: center;
        }
        
        header{
            height: 10%;
            width: 100%;
            background-color: skyblue;
            display: flex;
            justify-content: left;
            align-items: center;

            a{
                text-decoration: none;
                color: white;
            }
        }
        
        footer{
            width: 100%;
            background-color: skyblue;
            display: flex;
            justify-content: left;
            align-items: center;

            a{
                text-decoration: none;
                color: white;
            }
        }
        .cabecera1{
            text-align: left;
            width: 33%;
            padding: 20px;
        }

        .cabecera2{
            text-align: center;
            width: 33%;
        }

        .cabecera3{
            text-align: right;
            width: 33%;
            padding: 20px;
        }
        .container{
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            border-radius: 10px;  
        }

        table{
            border-collapse: collapse;
            margin: 10px auto;
            & td{
                border: 1px solid black;
            }
        }

        .nombre{
            background-color: lightblue;
            font-weight: bold;
        }

        .valor{
            background-color: antiquewhite;
        }
        
        .titulo{
            background-color: lightgreen;
        }
        footer{
            margin: auto;
            text-align: center;
            align-content: center;
            height: 50px;;
            color: white;

            & a{
               text-decoration: none; 
            }
        }
        #cerrarS, #salir{
            margin-top: 20px;
            background-color: #ffcc00;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="cabecera1">
            <h2>Log In - Log Off Tema 5</h2>
        </div>
        <div class="cabecera2">
            <h2>Página de detalles</h2>
        </div>
        <div class="cabecera3">
            <form method="post">
                <?php
                    if($_COOKIE["idioma"]==="ES" || !isset($_COOKIE["idioma"])){echo '<img src="https://flagcdn.com/es.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="FR"){echo '<img src="https://flagcdn.com/fr.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="PT"){echo '<img src="https://flagcdn.com/pt.svg" alt="imagen" width="20" height="20">';}
                ?>
                <button type="submit" name="cerrarS" id="cerrarS">Cerrar Sesión</button>
            </form>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="tabla">
                <?php
                    // Comprueba si el botón "salir" ha sido pulsado.
                    if(isset($_REQUEST['salir'])){
                        // Nos dirigimos a la página de inicio privado.
                        header("location: inicioPrivado.php");
                        exit;
                    }
                    
                    // Comprueba si el botón "cerrarS" ha sido pulsado.
                    if(isset($_REQUEST['cerrarS'])){
                        // Nos dirigimos a la página inicial.
                        header("location: ../indexLoginLogoffTema5.php");
                        exit;
                    }
                    
                    // Mostramos el contenido de la variable superglobal $_SESSION.
                    echo '<h2>Valores de la variable superglobal: $_SESSION</h2>';
                    echo "<table>";
                    if(!empty($_SESSION)){
                        foreach ($_SESSION as $key => $value) {
                            echo "<tr>";
                            echo '<td class = nombre>'.$key.'</td>';
                            echo "<td class='valor'><pre> ". print_r($value, true) ."</pre></td>";
                            echo "</tr>";
                        }
                    }  else{
                        echo "<tr>";
                        echo "<td class='nombre'>No hay variable</td>";
                        echo "<td class='valor'>No hay valor</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    // Mostramos el contenido de la variable superglobal $_COOKIE.
                    echo '<h2>Valores de la variable superglobal: $_COOKIE</h2>';
                    echo "<table>";
                    if(!empty($_COOKIE)){
                        foreach ($_COOKIE as $key => $value) {
                            echo "<tr>";
                            echo "<td class='nombre'>{$key}</td>";
                            echo "<td class='valor'>{$value}</td>";
                            echo "</tr>";
                        }
                    } else{
                        echo "<tr>";
                        echo "<td class='nombre'>No hay variable</td>";
                        echo "<td class='valor'>No hay valor</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                    // Mostramos el contenido de la variable superglobal $_SERVER.
                    echo '<h2>Valores de la variable superglobal: $_SERVER</h2>';
                    echo "<table>";
                    if(!empty($_SERVER)){
                        foreach ($_SERVER as $key => $value) {
                            echo "<tr>";
                            echo "<td class='nombre'>{$key}</td>";
                            echo "<td class='valor'>{$value}</td>";
                            echo "</tr>";
                        }
                    } else{
                        echo "<tr>";
                        echo "<td class='nombre'>No hay variable</td>";
                        echo "<td class='valor'>No hay valor</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                <form>
                    <button type="submit" name="salir" id="salir">Salir</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="pie1">
            <a href="../indexProyectoTema5.php">Álvaro Allén Perlines</a>
            <time>2025-11-24</time>
        </div>
        <div class="pie2">
            <a href="https://github.com/SrAllen14/ALPDWESLoginLogoffTema5/tree/master" target="blank"><i class="fab fa-github"></i></a>
        </div>
    </footer>
</body>
</html>