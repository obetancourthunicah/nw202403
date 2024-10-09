<?php
require_once 'vendor/autoload.php';
session_start();

use Uch\Oop\Hotel\Cliente;
use Uch\Oop\Hotel\Extras\ExtraConTour;
use Uch\Oop\Hotel\Extras\ExtraTodoIncluido;
use Uch\Oop\Hotel\FabricaHotel;
use Uch\Oop\Hotel\Reserva;
use Uch\Oop\Hotel\ReservaHabitacion;
use Uch\Oop\Hotel\ColleccionReserva;



$txtNombre = '';
$txtCorreo = '';
$txtTelefono = '';
$txtIdentidad = '';

$habitaciones = FabricaHotel::getHabitaciones();

if (isset($_POST["btnEnviar"])) {

    $reserva = new Reserva();

    $txtNombre = $_POST["txtNombre"];
    $txtCorreo = $_POST["txtCorreo"];
    $txtTelefono = $_POST["txtTelefono"];
    $txtIdentidad = $_POST["txtIdentidad"];

    $cliente = new Cliente();
    $cliente->setNombre($txtNombre);
    $cliente->setCorreo($txtCorreo);
    $cliente->setTelefono($txtTelefono);
    $cliente->setIdentidad($txtIdentidad);

    $reserva->setCliente($cliente);


    $cmbHabitacion = $_POST["cmbHabitacion"];
    $selectedHabitacion = null;
    foreach ($habitaciones as $habitacion) {
        if ($habitacion->getNumero() === $cmbHabitacion) {
            $selectedHabitacion = $habitacion;
            break;
        }
    }

    $reservaHabitacion = new ReservaHabitacion();
    $reservaHabitacion->setHabitacion($selectedHabitacion);

    if (isset($_POST["todoIncluido"])) {
        $todoIncluido = new ExtraTodoIncluido();
        $reservaHabitacion->addExtra($todoIncluido);
    }

    if (isset($_POST["conTour"])) {
        $conTour = new ExtraConTour();
        $reservaHabitacion->addExtra($conTour);
    }

    $reserva->addHabitacion($reservaHabitacion);

    ColleccionReserva::agregarReserva($reserva);
    header("location:lista.php");
    die();
}

if (isset($_POST["btnReset"])) {
    ColleccionReserva::clearReservas();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de Hotel</title>
</head>

<body>
    <h1>Reserva de Habitación</h1>
    <form action="test.php" method="post">
        <fieldset>
            <legend>Datos del Cliente</legend>
            <label for="txtNombre">Nombre Completo</label>
            <input type="text" required name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre Completo" />
            <br />
            <label for="txtCorreo">Correo</label>
            <input type="text" required name="txtCorreo" id="txtCorreo" value="<?php echo $txtCorreo; ?>" placeholder="Correo" />
            <br />
            <label for="txtTelefono">Telefono</label>
            <input type="text" required name="txtTelefono" id="txtTelefono" value="<?php echo $txtTelefono; ?>" placeholder="Telefono" />
            <br />
            <label for="txtIdentidad">Identidad</label>
            <input type="text" required name="txtIdentidad" id="txtIdentidad" value="<?php echo $txtIdentidad; ?>" placeholder="Identidad" />
        </fieldset>
        <fieldset>
            <legend>Habitación</legend>
            <label for="cmbHabitacion">Habitación</label>
            <select name="cmbHabitacion" id="cmbHabitacion">
                <?php
                foreach ($habitaciones as $habitacion) {
                    echo '<option value="' . $habitacion->getNumero() . '">';
                    echo $habitacion->getNumero() . " | " . $habitacion->getEdificio() . " ( " . $habitacion->getPrecio() . " ) ";
                    echo '</option>';
                }
                ?>
            </select>
            <br />
            <input type="checkbox" name="todoIncluido" value="1" id="todoIncluido" /> <label for="todoIncluido"> Todo Incluido</label><br />
            <input type="checkbox" name="conTour" value="1" id="conTour" /> <label for="conTour">Con Tour</label><br />
        </fieldset>
        <button type="submit" name="btnEnviar" value="Enviar">Enviar</button>&nbsp;
    </form>
    <form action="test.php" method="post">
        <button type="submit" name="btnReset" value="Vaciar">Vaciar</button>
    </form>
</body>

</html>