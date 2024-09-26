<?php

namespace Uch\Oop\Hotel;

class Habitacion
{
    private string $numero;
    private $tipo;
    private $edificio;

    /* getters y setters */
    /*
    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }
    */

    public function __construct(string $numero, string $tipo, string $edificio)
    {
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->edificio = $edificio;
    }

    public function toDictionary()
    {
        return [
            "numero" => $this->numero,
            "tipo" => $this->tipo,
            "edificion" => $this->edificio
        ];
    }
}
