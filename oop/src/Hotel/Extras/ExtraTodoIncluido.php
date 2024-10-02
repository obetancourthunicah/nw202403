<?php

namespace Uch\Oop\Hotel\Extras;

use Uch\Oop\Hotel\IExtra;

class ExtraTodoIncluido implements IExtra
{
    private float $precio;
    private string $method;

    public function __construct()
    {
        $this->precio = 1500;
        $this->method = 'sumar';
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }
    public function getMetodo(): string
    {
        return $this->method;
    }
    public function aplicarAPrecio(float $valor): float
    {
        return $valor + $this->precio;
    }
}
