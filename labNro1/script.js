const divLogueo = document.getElementById("logueo");
const divBienvenida = document.getElementById("bienvenida");
const divTarea = document.getElementById("tareas");

const btnInicioSeccion = document.getElementById("InicioSeccion");
const btnCrear = document.getElementById("CrearUsuario");
const btnContinuarBienvenida = document.getElementById("continuar");

let fechaActual = new Date().toLocaleDateString();

let FechaIngreso;
let nombreActual;
let contadorVisita;

//////////////////////////////////////////////////////////////

btnInicioSeccion.addEventListener("click", () => {
    let nombre = document.getElementById("nombre").value.trim();
    if (nombre === "") {
        alert("Ingrese un nombre");
    } else {
        verificarUsuario(nombre);
    }
});

function verificarUsuario(nombre) {
    nombreActual = localStorage.getItem("nombreGuardado");
    if (nombreActual === nombre) {
        divLogueo.style.display = "none";
        rellenarBienvenida();
        divBienvenida.style.display = "block";
    } else {
        alert("No esta logueado, necesita crear una cuenta");
    }
}

btnCrear.addEventListener("click", () => {
    let nombre = document.getElementById("nombre").value.trim();
    if (nombre === "") {
        alert("Ingrese un nombre");
    } else {
        guardarDatos(nombre);
        divLogueo.style.display = "none";
        rellenarBienvenida();
        divBienvenida.style.display = "block";
    }
});

function guardarDatos(nombre) {
    localStorage.setItem("nombreGuardado", nombre);
    localStorage.setItem("visitas", 0);
    localStorage.setItem("fecha", fechaActual);
    localStorage.setItem("tareas", JSON.stringify([]));
    localStorage.setItem("tareasTerminadas", JSON.stringify([]));
    actualizar();
}
function actualizar() {
    nombreActual = localStorage.getItem("nombreGuardado");
    fechaActual = localStorage.getItem("fecha");
    contadorVisita = localStorage.getItem("visitas");
    if (contadorVisita === null) {
        contadorVisita = 0;
        localStorage.setItem("visitas", contadorVisita);
    }
    
}

////////////////////////////////

function rellenarBienvenida() {
    document.getElementById("bienvenidaUsuario").textContent = `Bienvenido de Nuevo, ${nombreActual}`
    sumarVisita();
    document.getElementById("visitaUsuario").textContent = `Es tu visita numero: ${contadorVisita}`;
    document.getElementById("fechaVisita").textContent = `Ultimo acceso ${fechaActual}`;
}

function sumarVisita() {
    contadorVisita = localStorage.getItem("visitas");
    if (contadorVisita === null) {
        contadorVisita = 0;
        localStorage.setItem("visitas", contadorVisita);
    } else {
        contadorVisita++;
        localStorage.setItem("visitas", contadorVisita);
    }
}
//////////////////////////////

btnContinuarBienvenida.addEventListener("click", () => {
    verDivTareas();
});

function verDivTareas() {
    divBienvenida.style.display = "none";
    rellenarTarea();
    divTarea.style.display = "block";

}

/////////////////////////////////////////
function agregarTarea() {
    let tarea = document.getElementById("tarea").value.trim();
    if (tarea === "") {
        alert("Ingrese una tarea");
    } else {
        let input = document.createElement("input");
        let label = document.createElement("label");
        input.type = "checkbox"
        input.name = "tareaCheck";
        label.textContent = tarea;
        label.appendChild(input);
        document.getElementById("TareasPendiente").appendChild(label);
        let tareas = JSON.parse(localStorage.getItem("tareas"));
        if (tareas === null) {
            tareas = [];
        }
        tareas.push(tarea);
        localStorage.setItem("tareas", JSON.stringify(tareas));
        document.getElementById("tarea").value = "";
        document.getElementById("tarea").focus();
    }
}

function borrarTodasTareas() {
    let tareas = document.querySelectorAll(`input[name="tareaCheck"]`);
    tareas.forEach(element => {
        const label = element.parentNode;
        document.getElementById("TareasPendiente").removeChild(label); 
        label.removeChild(element);
    });
    document.getElementById("tareasTerminadas").innerHTML = "";
    const h2 = document.createElement("h2");
    h2.textContent = "Tareas Terminadas";
    document.getElementById("tareasTerminadas").appendChild(h2);
}

function finalizarTarea(){
     let seleccionadoCheck = document.querySelectorAll(`input[name="tareaCheck"]:checked`);
    seleccionadoCheck.forEach(element => {
        const tareasFinalizada = element.parentNode;
        document.getElementById("TareasPendiente").removeChild(tareasFinalizada);
        tareasFinalizada.removeChild(element);
        document.getElementById("tareasTerminadas").appendChild(tareasFinalizada);
        let tareasTerminadas = JSON.parse(localStorage.getItem("tareasTerminadas"));
        if (tareasTerminadas === null) {
            tareasTerminadas = [];
        }
        tareasTerminadas.push(tareasFinalizada.textContent);
        localStorage.setItem("tareasTerminadas", JSON.stringify(tareasTerminadas));
    });
}
//////////////////////////////////////////////////////7
function rellenarTarea() {
    let tareas = JSON.parse(localStorage.getItem("tareas"));
    if (tareas) {
        tareas.forEach(tarea => {
            let input = document.createElement("input");
            let label = document.createElement("label");
            input.type = "checkbox"
            input.name = "tareaCheck";
            label.textContent = tarea;
            label.appendChild(input);
            document.getElementById("TareasPendiente").appendChild(label);
        });
    }
    let tareasTerminadas = JSON.parse(localStorage.getItem("tareasTerminadas"));
    if (tareasTerminadas) {
        tareasTerminadas.forEach(tarea => {
            let input = document.createElement("input");
            let label = document.createElement("label");
            input.type = "checkbox"
            input.name = "tareaCheck";
            label.textContent = tarea;
            label.appendChild(input);
            document.getElementById("tareasTerminadas").appendChild(label);
        });
    }
}