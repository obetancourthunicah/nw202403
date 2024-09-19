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
