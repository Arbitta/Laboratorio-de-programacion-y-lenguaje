<?php 
include_once "usuario.class.php";
function logueo()
{ ?>
<form action="index.php" method="post">
    <h2>Inicio Sesion</h2>
    <label>Ingrese su nombre: </label>
    <input type="text" name="nombre" required>
    <input type="submit" value="Iniciar Sesion" name="inicio">
</form>
<?php }
//posible parametro una clase usuario
function bienvenida(Usuario_class $usuario)
{ ?>
<form action="index.php" method="post">
    <?php 
    echo "<h2> Bienvenido ". $usuario->getNombre()."</h2>";
    echo "<label>Es tu visita: " .$usuario->getCantVisita()."</label>";
    echo "<label> Tu ultimo ingreso fue: ".$usuario->getUltimaConexion()."<label>";
    ?>
    <input type="submit" value="Continuar" name="continuar">
</form>
<?php }
function gestionTarea(Usuario_class $usuario)
{ ?>
<form action="index.php" method="post">
    <h3>Ingrese una tarea</h3>
    <input type="text" name="tarea">
    <input type="submit" value="agregar" name="agregarTarea">
    <input type="submit" value="limpiar tarea" name="limpiarTarea">
    <h2>Tareaas Pendiente</h2>
    <?php 
    foreach ($usuario->getListaTareaPendiente() as $key => $value) {
        echo "<label><input type='checkbox' name='tareaPendiente[]' value='$value'>$value</label>";
    }
    ?>
    <input type="submit" value="Terminar Tarea" name="terminarTarea">
    <h2>Tarea Finalizada</h2>
    <?php 
    foreach ($usuario->getListaTareaFinalizada() as $value) {
        echo "<label>$value</label>";
    }
    ?>
    <input type="submit" value="Salir" name="salir">

</form>
<?php } ?>