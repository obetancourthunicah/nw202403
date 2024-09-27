<?php

namespace Uch\Oop\Hotel;

interface IExtra
{
    public function getPrecio(): float;
    public function getMetodo(): string;
    public function aplicarAPrecio(float $valor): float;
}
