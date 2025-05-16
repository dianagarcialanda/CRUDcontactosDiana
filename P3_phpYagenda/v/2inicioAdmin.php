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
                <a href="#agregar" id="btn-agregar">Agregar</a>
                <a href="#actualizar" id="btn-actualizar">Actualizar</a>
                <a href="#eliminar" id="btn-eliminar">Eliminar</a>
            </div>
            
            <section class="seccion-contenido">
                <h3>¡Hola administrador!</h3>
                <h4>Lista de Contactos</h4>
                
                <?php include('../c/ControladorContacto.php'); ?>
                
                <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>ID Usuario</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($contactos) && !empty($contactos)): ?>
            <?php foreach ($contactos as $contacto): ?>
                <tr>
                    <td><?= htmlspecialchars($contacto['id']) ?></td>
                    <td><?= htmlspecialchars($contacto['nombre']) ?></td>
                    <td><?= htmlspecialchars($contacto['direccion']) ?></td>
                    <td><?= htmlspecialchars($contacto['telefono']) ?></td>
                    <td><?= htmlspecialchars($contacto['email']) ?></td>
                    <td><?= htmlspecialchars($contacto['id_usuario']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No se encontraron contactos.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

        <?php include('formAgregar.html'); ?>


        <?php include('formActualizar.html'); ?>

        <?php include('formEliminar.html'); ?>

    </form>
</div>

                <script src="/P3_phpYagenda/js/crudContactos.js"></script>
                <script src="/P3_phpYagenda/js/popupConfirmacion.js"></script>

            
            </section>
        </div>
    </div>
    
    <?php include('pie.html'); ?>
</body>
</html>