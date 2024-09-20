<?php
session_start();
require_once 'libreria.php';

$ordenes = obtenerOrdenes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Orden Numero</th>
                <th>Comprador</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenes as $orden) { ?>
                <tr>
                    <td><?php echo $orden["uuid"]; ?></td>
                    <td><?php echo $orden["nombre"]; ?></td>
                    <td><?php echo $orden["producto"]["nombre"]; ?></td>
                    <td><?php echo $orden["producto"]["precio"]; ?></td>
                    <td><?php echo $orden["cantidad"]; ?></td>
                    <td><?php echo $orden["total"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>