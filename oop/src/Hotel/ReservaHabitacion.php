<?php

namespace Uch\Oop\Hotel;

use Error;

class ReservaHabitacion
{
    private IHabitacion $habitacion;
    private $extras;
    public function __construct()
    {
        $this->extras = [];
    }

    public function setHabitacion(IHabitacion $habitacion)
    {
        $this->habitacion = $habitacion;
    }

    public function addExtra(IExtra $extra): void
    {
        $this->extras[] = $extra;
    }

    public function getTotal(int $dias)
    {
        if ($this->habitacion === null) {
            throw new Error("Habitación No Encontrada");
        }
        if ($dias < 1) {
            throw new Error("Valor incorrecto en Días.");
        }
        $precioHabitacion = $this->habitacion->getPrecio() * $dias;
        foreach ($this->extras as $extra) {
            $precioHabitacion = $extra->aplicarAPrecio($precioHabitacion);
        }
        return $precioHabitacion;
    }
}