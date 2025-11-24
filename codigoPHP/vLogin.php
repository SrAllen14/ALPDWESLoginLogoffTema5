<!DOCTYPE html>
<html>
    <head>
        <title>Plantilla HTML</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
        <link rel="stylesheet" href="../webroot/estilos/estilos.css"/>
        <link rel="stylesheet" href="../webroot/estilos/estilosFormulario.css"/>
    </head>
    <body>
        <?php
            if(isset($_REQUEST['cancelar'])){
                header("location: ../indexProyectoTema5.php");
                exit;
            }
            if(isset($_REQUEST['iniciar'])){
                header("location: vInicioPrivado.php");
                exit;
            }
            if(isset($_REQUEST['registrar'])){
                header("location: vRegistro.php");
                exit;
            }
        ?>
        <header>
            <div class="cabecera1">
                <h2>Log in-Log off Tema 5</h2>
            </div>
            <div class="cabecera2">
                <h2>Login</h2>
            </div>
            <div class="cabecera3">
                <?php
                    if($_COOKIE["idioma"]==="ES"){echo '<img src="https://flagcdn.com/es.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="FR"){echo '<img src="https://flagcdn.com/fr.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]==="PT"){echo '<img src="https://flagcdn.com/pt.svg" alt="imagen" width="20" height="20">';}
                    if($_COOKIE["idioma"]===""){echo '<p>Idioma no escogido</p>';}
                ?>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="formulario">
                    <form method="post">
                        <h1>Inicio de sesión</h1>
                        <input name="nombre" id="nombre" type="text" placeholder="Usuario..."><br><br>
                        <input name="pass" id="pass" type="text" placeholder="Contraseña..."><br><br>
                        <button type="submit" name="registrar" id="registrar">Registrarse</button>
                        <button type="submit" name="iniciar" id="iniciar">Entrar</button>
                        <button type="submit" name="cancelar" id="cancelar">Cancelar</button>
                    </form>
                </div>
                
            </div>
        </main>
        <footer>
            <div class="pie1">
                <a href="">Álvaro Allén Perlines</a>
                <time>2025-11-24</time>
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
