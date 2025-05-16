
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
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </div>
            
            <section class="seccion-contenido">
                <h3>¡Hola usuario!</h3>

                <?php 
                include('../c/ControladorContacto.php'); 
                
                // Aquí procesamos los contactos del usuario
                if (isset($contactos) && !empty($contactos)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contactos as $contacto): ?>
                                <tr>
                                    <td><?= htmlspecialchars($contacto['id']) ?></td>
                                    <td><?= htmlspecialchars($contacto['nombre']) ?></td>
                                    <td><?= htmlspecialchars($contacto['direccion']) ?></td>
                                    <td><?= htmlspecialchars($contacto['telefono']) ?></td>
                                    <td><?= htmlspecialchars($contacto['email']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No tienes contactos registrados.</p>
                <?php endif; ?>
                
            </section>
        </div>
    </div>
    
    <?php include('pie.html'); ?>
</body>
</html>
