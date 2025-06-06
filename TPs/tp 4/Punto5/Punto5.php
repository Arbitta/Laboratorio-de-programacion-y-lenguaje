<?php
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once 'script.php';
    $calculo = new calculo($_POST['bolsa'], $_POST['alimento']);
    $resultado = $calculo->calularTotal();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Punto 5</title>
</head>
<body>
    <header><h1>Comida de mascota</h1></header>
    <form action="" method="post">
        <label>Mascota: 
            <select name="mascota">
                <option value="Fox Terrier">Fox Terrier</option>
                <option value="Labrador">Labrador</option>
                <option value="Caniche">Caniche</option>
                <option value="Chiguagua">Chiguagua</option>
            </select>
        </label>
        <label> Cantidad de Alimento que come por dia: <input type="number" name="alimento" required> Gramos</label>
        <label>Tipo de bolsa: 
            <select name="bolsa">
                <option value="0.5">1/2 Kilogramos</option>
                <option value="1">1 Kilogramos</option>
                <option value="3">3 Kilogramos</option>
            </select>
        </label>
        <label> Total de bolsa:  <?php echo $resultado ?></label>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>