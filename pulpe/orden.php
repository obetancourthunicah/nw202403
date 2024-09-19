<?php
require_once 'libreria.php';

session_start();
$intNumerosPost = 0;
$txtCodigo = 'PRD001';

if (isset($_SESSION["numeroPost"])) {
    $intNumerosPost = $_SESSION["numeroPost"];
}

if (isset($_POST["btnEnviar"])) {
    $intNumerosPost += 1;
    $_SESSION["numeroPost"] = $intNumerosPost;
    $txtCodigo = $_POST["txtCodigo"];
    $producto = findProductoByCodigo($txtCodigo);
    if ($producto !== null) {
        print_r($producto);
        die();
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenes de la Pulpe</title>
</head>

<body>
    <h1>Pulperia</h1>
    <form action="orden.php" method="post">
        <lable for="txtCodigo">Código</lable>
        <input type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $txtCodigo; ?>" />
        <button type="submit" name="btnEnviar">Enviar</button>
    </form>
    <hr />
    <div>
        <?php
        echo $intNumerosPost;
        ?>
    </div>
</body>

</html>