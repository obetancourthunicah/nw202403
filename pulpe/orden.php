<?php
require_once 'libreria.php';

session_start();
$intNumerosPost = 0;
$txtCodigo = 'PRD001';
$txtNombre = '';
$txtCantidad = 1;
$txtMessage = '';


if (isset($_POST["btnEnviar"])) {
    $txtCodigo = $_POST["txtCodigo"];
    $txtNombre = $_POST["txtNombre"];
    $txtCantidad = intval($_POST["txtCantidad"]);
    $producto = findProductoByCodigo($txtCodigo);
    if ($producto !== null && !empty($txtNombre) && $txtCantidad > 0) {
        $miOrden = construirOrden(
            $txtNombre,
            $txtCantidad,
            $producto
        );
        agregarAListaDeOrdenes($miOrden);
        $txtMessage = "Orden Agregada Satisfactoriamente";
    } else {
        $txtMessage = "Producto o valores no están dentro de lo permitido";
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
        <label for="cmbProductos">Seleccion el Producto a Comprar</label>
        <select id="cmbProductos" name="txtCodigo">
            <?php
            foreach ($productos as $producto) {
                echo '<option value="'
                    . $producto["codigo"]
                    . (($producto["codigo"] == $txtCodigo) ? ' selected' : '')
                    . '">' . $producto["nombre"]
                    . " (" . $producto["precio"]
                    . ') </option>';
            }
            ?>
        </select>
        <br />
        <label for="txtNombre">Nombre del Cliente</label>
        <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" />
        <br />
        <label for="txtCantidad">Cantidad Producto</label>
        <input type="number" name="txtCantidad" id="txtCantidad" value="<?php echo $txtCantidad; ?>" />
        <br />
        <button type="submit" name="btnEnviar">Enviar</button>
    </form>
    <hr />
    <div>
        <a href="listados.php">Ir a Listados</a>
        <?php
        echo $txtMessage;
        ?>
    </div>
</body>

</html>