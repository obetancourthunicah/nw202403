<?php
// En medio de las etiquetas de PHP es CODIGO PHP
/*
        Comentario
*/

//$intEdadComercial = 100;

//$_POST

$txtNombre = "";
$intEdad = 18;
$txtMensajeFinal = "";
if (isset($_POST["btnEnviar"])) {
    $txtNombre = $_POST["txtNombre"];
    $intEdad = intval($_POST["intEdad"]);
    $txtMensajeFinal = "Bienvenido " . $txtNombre . " (" . $intEdad . ")";
    if ($intEdad >= 18) {
        $txtMensajeFinal .= ", ¡Ya está ruco!";
    } elseif ($intEdad <= 5) {
        $txtMensajeFinal .= ", ¡Todavía esta pollón!";
    } else {
        $txtMensajeFinal .= ", ¡Nada que decir!";
    }
}

if (isset($_POST["btnEnviar2"])) {
    $txtNombre = $_POST["txtNombre"];
    $intEdad = intval($_POST["intEdad"]);
    $txtMensajeFinal = "Bienvenido Dummy " . $txtNombre . " (" . $intEdad . ")";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer Script PHP</title>
</head>

<body>
    <!-- Todo lo que esta afuera es Texto HTML -->
    <h1>Formulario de Datos Generales</h1>
    <form action="primer_script.php" method="POST">
        <label for="txtNombre">Nombre Completo</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre Completo" value="<?php echo $txtNombre; ?>" />
        <br />
        <label for="intEdad">Edad</label>
        <input type="number" name="intEdad" id="intEdad" placeholder="0 - 100" value="<?php echo $intEdad; ?>" />
        <br />
        <button type="submit" name="btnEnviar">Enviar</button>
        <button type="submit" name="btnEnviar2">Enviar Dummy</button>
    </form>
    <hr />
    <?php
    echo $txtMensajeFinal;
    ?>
</body>

</html>