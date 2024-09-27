<?php
require_once 'vendor/autoload.php';

use Uch\Oop\Hotel\Cliente;
use Uch\Oop\Hotel\HabitacionDoble;
use Uch\Oop\Hotel\HabitacionSimple;
use Uch\Oop\Hotel\Reserva;
use Uch\Oop\Hotel\ReservaHabitacion;

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
    echo $habitacion->getPrecio();
    echo '<hr/>';
}


echo '<hr/>';

$reserva = new Reserva();
$cliente = new Cliente();
$cliente->setNombre('Orlando');
$cliente->setCorreo('obetancourthunicah@gmail.com');
$cliente->setTelefono('00000000');
$cliente->setIdentidad('0000-1928-12938');

$reserva->setCliente($cliente);

$reservaHabitacion = new ReservaHabitacion();
$reservaHabitacion->setHabitacion($habitacion1);
$reserva->addHabitacion($reservaHabitacion);

echo "Total de la reserva: " . $reserva->getTotal();
