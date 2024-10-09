<?php

namespace Uch\Oop\Hotel;

use DateTime;
use DateInterval;

class Reserva
{
    private Cliente $cliente;
    private $habitaciones;
    private $fechaInicio;
    private $fechaFinal;

    private DateInterval $dateInterval;

    public function __construct()
    {
        $this->dateInterval = DateInterval::createFromDateString('3 days');
        $this->habitaciones = [];
        $this->fechaInicio = new DateTime();
        $this->fechaFinal = new DateTime();
        $this->fechaFinal->add($this->dateInterval);
    }

    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function addHabitacion(ReservaHabitacion $habitacion)
    {
        $this->habitaciones[] = $habitacion;
    }

    public function getDias()
    {
        $intervalo = $this->fechaFinal->diff($this->fechaInicio);
        return $intervalo->d;
    }

    public function getTotal()
    {
        $totalReserva = 0;
        foreach ($this->habitaciones as $habitacion) {
            $totalReserva += $habitacion->getTotal($this->getDias());
        }
        return $totalReserva;
    }

    public function toJSON()
    {
        $tmpHabitaciones = [];
        foreach ($this->habitaciones as $habitacion) {
            $tmpHabitaciones[] = $habitacion->toDictionary();
        }
        $tmpDictionary = [
            "cliente" => $this->cliente->toDictionary(),
            "fechaInicio" => $this->fechaInicio,
            "fechaFinal" => $this->fechaFinal,
            "habitaciones" => $tmpHabitaciones,
            "total" => $this->getTotal()
        ];

        return json_encode($tmpDictionary);
    }
    public function fromJSON(string $jsonString) {}
}

/*
Reserva 
Cliente puede seleccionar una habitacion
Si va todo Inlcuido
Si tiene Tour
Si Tiene Masajes
Con Transporte

------------------
Cliente
Fecha Inicio
Fecha Final
*Dias
Habitaciones
    Extras
    Descuento
*/
