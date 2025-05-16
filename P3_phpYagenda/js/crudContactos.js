document.addEventListener('DOMContentLoaded', function() {
    ocultarTodosLosFormularios();
    
    // Asignar eventos
    document.querySelector('a[href="#agregar"]').addEventListener('click', (e) => {
        e.preventDefault();
        mostrarFormulario('agregar');
    });
    
    document.querySelector('a[href="#actualizar"]').addEventListener('click', (e) => {
        e.preventDefault();
        mostrarFormulario('actualizar');
        document.getElementById('form-actualizar').style.display = 'none'; // Ocultar form inicialmente
    });
    
    document.querySelector('a[href="#eliminar"]').addEventListener('click', (e) => {
        e.preventDefault();
        mostrarFormulario('eliminar');
        document.getElementById('form-eliminar').style.display = 'none'; // Ocultar form inicialmente
    });
});



// Funciones básicas
function ocultarTodosLosFormularios() {
    document.querySelectorAll('.form-container').forEach(form => {
        form.style.display = 'none';
    });
}

function mostrarFormulario(tipo) {
    ocultarTodosLosFormularios();
    const form = document.getElementById(tipo);
    if (form) form.style.display = 'block';
    window.location.hash = tipo;
}



// Asignar evento al campo de búsqueda
document.getElementById('buscar-id-actualizar').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        buscarContactoParaEditar();
    }
});

// Asignar evento al botón de búsqueda
document.getElementById('buscar-id-actualizar').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        buscarContactoParaEditar();
    }
});





//Buscar contacto para eliminar--------------------------------------------------------------

async function buscarContactoParaEliminar() {
    const id = document.getElementById('buscar-id').value;
    if (!id) return alert('Ingrese un ID válido');

    try {
        const response = await fetch(`../c/ControladorContacto.php?accion=obtener&id=${id}`);
        const contacto = await response.json();
        
        const formEliminar = document.getElementById('form-eliminar');
        
        if (contacto?.id) {
            document.getElementById('eliminar-id').textContent = contacto.id;
            document.getElementById('eliminar-nombre').textContent = contacto.nombre;
            document.getElementById('eliminar-telefono').textContent = contacto.telefono;
            document.getElementById('delete-id').value = contacto.id;
            formEliminar.style.display = 'block';
        } else {
            alert('Contacto no encontrado');
            formEliminar.style.display = 'none';
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al buscar contacto');
    }
}


// Función para buscar contacto para actualizar--------------------------------------------------
async function buscarContactoParaActualizar() {
    const id = document.getElementById('buscar-id-actualizar').value;
    if (!id) return alert('Ingrese un ID válido');

    try {
        const response = await fetch(`../c/ControladorContacto.php?accion=obtener&id=${id}`);
        
        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        
        const contacto = await response.json();
        const formActualizar = document.getElementById('form-actualizar');
        
        if (contacto?.id) {
            // Llenar formulario con los datos del contacto
            document.getElementById('actualizar-id').value = contacto.id;
            document.getElementById('actualizar-id-texto').textContent = contacto.id;
            document.getElementById('actualizar-nombre').value = contacto.nombre;
            document.getElementById('actualizar-direccion').value = contacto.direccion || '';
            document.getElementById('actualizar-telefono').value = contacto.telefono;
            document.getElementById('actualizar-email').value = contacto.email || '';
            document.getElementById('actualizar-id-usuario').value = contacto.id_usuario;
            
            formActualizar.style.display = 'block';
        } else {
            alert('Contacto no encontrado');
            formActualizar.style.display = 'none';
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al buscar contacto: ' + error.message);
    }
}

// Asignar evento al campo de búsqueda de actualización
document.getElementById('buscar-id-actualizar').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        buscarContactoParaActualizar();
    }
});


// Asignar eventos a los botones de búsqueda
document.getElementById('buscar-id-actualizar').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        buscarContactoParaEditar();
    }
});

document.getElementById('buscar-id').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        buscarContactoParaEliminar();
    }
});