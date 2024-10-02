<?php

namespace Uch\Oop\Hotel;

use Uch\Oop\Hotel\HabitacionSimple;
use Uch\Oop\Hotel\HabitacionDoble;
use Uch\Oop\Hotel\HabitacionCuadruple;

class FabricaHotel
{
    static $habitaciones;
    private function __construct() {}

    public static function getHabitaciones()
    {
        if (self::$habitaciones == null) {
            self::$habitaciones = [];
            self::$habitaciones[] = new HabitacionSimple(
                "3.1",
                "E1",
                1500
            );
            self::$habitaciones[] = new HabitacionSimple(
                "3.2",
                "E1",
                1500
            );
            self::$habitaciones[] = new HabitacionSimple(
                "3.3",
                "E1",
                1500
            );
            self::$habitaciones[] = new HabitacionSimple(
                "3.4",
                "E1",
                1500
            );
            self::$habitaciones[] = new HabitacionDoble(
                "2.1",
                "E1",
                2500
            );
            self::$habitaciones[] = new HabitacionDoble(
                "2.2",
                "E1",
                2500
            );
            self::$habitaciones[] = new HabitacionCuadruple(
                "1.1",
                "E1",
                5000
            );
        }
        return self::$habitaciones;
    }
}
