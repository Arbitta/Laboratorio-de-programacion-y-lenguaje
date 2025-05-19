let currentUser = null;

function login() {
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Ingrese un nombre de usuario");

    const userData = JSON.parse(localStorage.getItem(username)) || {
        visits: 0,
        lastLogin: null,
        tasks: {
            pending: [],
            finished: []
        }
    };

    userData.visits += 1;
    const now = new Date();
    const welcomeMsg = userData.visits === 1
        ? `Hola ${username}, es tu primera vez en el gestor de tareas.`
        : `Hola ${username}, es tu visita número ${userData.visits}. Último ingreso: ${userData.lastLogin}`;

    userData.lastLogin = now.toLocaleString();
    localStorage.setItem(username, JSON.stringify(userData));

    currentUser = username;
    document.getElementById("login-container").classList.add("hidden");
    document.getElementById("app-container").classList.remove("hidden");
    document.getElementById("welcome").innerText = welcomeMsg;

    loadTasks();
}

function logout() {
    currentUser = null;
    document.getElementById("username").value = "";
    document.getElementById("login-container").classList.remove("hidden");
    document.getElementById("app-container").classList.add("hidden");
}

function getUserData() {
    return JSON.parse(localStorage.getItem(currentUser));
}

function saveUserData(data) {
    localStorage.setItem(currentUser, JSON.stringify(data));
}

function addTask() {
    const taskInput = document.getElementById("new-task");
    const task = taskInput.value.trim();
    if (!task) return;

    const userData = getUserData();
    userData.tasks.pending.push(task);
    saveUserData(userData);
    taskInput.value = "";
    loadTasks();
}

function markAsFinished(index) {
    const userData = getUserData();
    const task = userData.tasks.pending.splice(index, 1)[0];
    userData.tasks.finished.push(task);
    saveUserData(userData);
    loadTasks();
}

function clearAllTasks() {
    if (confirm("¿Seguro que deseas eliminar todas las tareas?")) {
        const userData = getUserData();
        userData.tasks.pending = [];
        userData.tasks.finished = [];
        saveUserData(userData);
        loadTasks();
    }
}

function loadTasks() {
    const userData = getUserData();
    const pendingList = document.getElementById("pending-list");
    const finishedList = document.getElementById("finished-list");

    pendingList.innerHTML = "";
    finishedList.innerHTML = "";

    userData.tasks.pending.forEach((task, index) => {
        const li = document.createElement("li");
        li.innerHTML = `${task} <button onclick="markAsFinished(${index})">Finalizar</button>`;
        pendingList.appendChild(li);
    });

    userData.tasks.finished.forEach(task => {
        const li = document.createElement("li");
        li.innerText = task;
        finishedList.appendChild(li);
    });
}
