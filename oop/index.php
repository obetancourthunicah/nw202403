<?php
require_once 'vendor/autoload.php';

use Uch\Oop\Hotel\HabitacionDoble;
use Uch\Oop\Hotel\HabitacionSimple;

$habitacionesDisponibles = [];

$habitacion1 = new HabitacionDoble(
    "1.1",
    "E1",
    3200.99
);

$habitacion2 = new HabitacionSimple(
    "1.2",
    "E1",
    2300.99
);

$habitacionesDisponibles[] = $habitacion1;
$habitacionesDisponibles[] = $habitacion2;
echo 'Navigating through habitaciones <br/>';
echo 'Elements' . count($habitacionesDisponibles) . '<br/>';
foreach ($habitacionesDisponibles as $habitacion) {
    print_r($habitacion->toDictionary());
    echo '<br/>';
}
