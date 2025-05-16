function confirmarEliminacionContacto() {
    const id = document.getElementById("delete-id").value;

    if (!id) {
        alert("Primero busca un contacto válido para eliminar.");
        return;
    }

    const overlay = document.createElement("div");
    overlay.style.position = "fixed";
    overlay.style.top = 0;
    overlay.style.left = 0;
    overlay.style.width = "100%";
    overlay.style.height = "100%";
    overlay.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    overlay.style.display = "flex";
    overlay.style.justifyContent = "center";
    overlay.style.alignItems = "center";
    overlay.style.zIndex = 1000;

    const popup = document.createElement("div");
    popup.style.background = "#fff";
    popup.style.padding = "20px";
    popup.style.borderRadius = "10px";
    popup.style.textAlign = "center";
    popup.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.3)";

    const mensaje = document.createElement("p");
    mensaje.textContent = "¿Estás seguro que deseas eliminar este contacto?";

    const btnSi = document.createElement("button");
    btnSi.textContent = "Sí";
    btnSi.style.margin = "10px";
    btnSi.style.padding = "10px 20px";
    btnSi.style.backgroundColor = "#e74c3c";
    btnSi.style.color = "white";
    btnSi.onclick = () => {
        // Creamos y enviamos un formulario manualmente
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "../c/ControladorContacto.php";

        const accion = document.createElement("input");
        accion.type = "hidden";
        accion.name = "accion";
        accion.value = "eliminar";

        const inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "id";
        inputId.value = id;

        form.appendChild(accion);
        form.appendChild(inputId);
        document.body.appendChild(form);
        form.submit();
    };

    const btnNo = document.createElement("button");
    btnNo.textContent = "No";
    btnNo.style.margin = "10px";
    btnNo.style.padding = "10px 20px";
    btnNo.style.backgroundColor = "#3498db";
    btnNo.style.color = "white";
    btnNo.onclick = () => {
        window.location.href = "/P3_phpYagenda/v/2inicioAdmin.php";

    };

    popup.appendChild(mensaje);
    popup.appendChild(btnSi);
    popup.appendChild(btnNo);
    overlay.appendChild(popup);
    document.body.appendChild(overlay);
}
