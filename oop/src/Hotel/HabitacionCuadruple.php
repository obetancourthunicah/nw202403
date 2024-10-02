<?php

namespace Uch\Oop\Hotel;


class HabitacionCuadruple extends Habitacion implements IHabitacion
{
    private float $precio;

    public function __construct(string $numero, string $edificio, float $precio)
    {
        parent::__construct($numero, 'cuadruple', $edificio);
        $this->precio = $precio;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function toDictionary(): array
    {
        $parentDictionary = parent::toDictionary();
        $parentDictionary["precio"] = $this->precio;
        return $parentDictionary;
    }
}
