<?php
$productos = [
    ["codigo" => "PRD001", "nombre" => "Panadol Ultra Caja", "precio" => 140],
    ["codigo" => "PRD002", "nombre" => "Chips Habaneros 160oz", "precio" => 38],
    ["codigo" => "PRD003", "nombre" => "Canada Dry Lata", "precio" => 19],
];

function findProductoByCodigo($codigo)
{
    global $productos;
    $producto = null;
    foreach ($productos as $prod) {
        if ($prod["codigo"] == $codigo) {
            $producto = $prod;
            break;
        }
    }
    return $producto;
}

function construirOrden($nombre, $cantidad, $producto)
{
    $orden = [
        "uuid" => time(),
        "nombre" => $nombre,
        "producto" => $producto,
        "cantidad" => $cantidad,
        "total" => round($cantidad * $producto["precio"] * 1.15, 2)
    ];
    return $orden;
}

function agregarAListaDeOrdenes($orden)
{
    $ordenes = [];
    if (isset($_SESSION["ordenes"])) {
        $ordenes = $_SESSION["ordenes"];
    }
    $ordenes[] = $orden;
    $_SESSION["ordenes"] = $ordenes;
}

function obtenerOrdenes()
{
    $ordenes = [];
    if (isset($_SESSION["ordenes"])) {
        $ordenes = $_SESSION["ordenes"];
    }
    return $ordenes;
}
