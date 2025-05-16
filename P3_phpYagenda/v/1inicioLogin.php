<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3_PHPYAGENDA</title>
    <link rel="stylesheet" href="/P3_phpYagenda/estilos/estiloInicio.css">
    <link rel="stylesheet" href="/P3_phpYagenda/estilos/estiloEncabezado.css">
    <link rel="stylesheet" href="/P3_phpYagenda/estilos/estiloAside.css">
    <link rel="stylesheet" href="/P3_phpYagenda/estilos/estiloPie.css">
</head>
<body>
    <?php include('encabezado.html'); ?>
    
    <div class="contenedor-principal"> <!--de todo-->
        <?php include('aside.html'); ?>
        
        <div class="contenido-principal">

            <div class="div-arriba">
                <img src="/P3_phpYagenda/img/calendario.png" width="30px" ></img>
                <img src="/P3_phpYagenda/img/calendario.png" width="30px" ></img>
                <img src="/P3_phpYagenda/img/calendario.png" width="30px" ></img>
            </div>


            <section class="seccion-contenido">
            <div class="login">
                <h3>Login</h3>
                    <form action="/P3_phpYagenda/c/ControladorUsuario.php" method="post">
                        <input type="text" name="usuario" placeholder="Usuario" required>
                        <input type="password" name="contrasena" placeholder="Contraseña" required>
                        <button type="submit">Entrar</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    
    <?php include('pie.html'); ?>
</body>
</html>