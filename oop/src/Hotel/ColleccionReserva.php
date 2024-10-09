<?php

namespace Uch\Oop\Hotel;

class ColleccionReserva
{
    private static $reservas = null;
    private function __construct() {}

    public static function getReservas()
    {
        if (!self::$reservas) {
            self::$reservas = [];
        }
        if (isset($_SESSION['reservas'])) {
            self::$reservas = json_decode($_SESSION['reservas']);
        }
        return self::$reservas;
    }

    public static function agregarReserva($reserva)
    {
        $reservas = self::getReservas();
        $reservas[] = $reserva;
        self::$reservas = $reservas;
        self::serializarReservas();
    }

    private static function deserializarReservas(string $reservas)
    {
        // TODO parsear el string
    }

    private static function serializarReservas()
    {
        $tmpReservas = [];
        foreach (self::$reservas as $reserva) {
            if (is_string($reserva)) {
                $tmpReservas[] = $reserva;
            } else {
                $tmpReservas[] = $reserva->toJSON();
            }
        }
        $_SESSION['reservas'] = json_encode($tmpReservas);
    }

    public static function clearReservas()
    {
        self::$reservas = [];
        unset($_SESSION["reservas"]);
    }
}
