<?php
require_once 'vendor/autoload.php';
session_start();

use Uch\Oop\Hotel\ColleccionReserva;

$reservas = ColleccionReserva::getReservas();

print_r($reservas);
