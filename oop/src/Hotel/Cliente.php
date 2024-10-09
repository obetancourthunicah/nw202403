<?php

namespace Uch\Oop\Hotel;

class Cliente
{
    private string $nombre;
    private string $correo;
    private string $telefono;
    private string $identidad;

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getIdentidad()
    {
        return $this->identidad;
    }

    public function setNombre(string $value)
    {
        $this->nombre = $value;
    }
    public function setCorreo(string $value)
    {
        $this->correo = $value;
    }
    public function setTelefono(string $value)
    {
        $this->telefono = $value;
    }
    public function setIdentidad(string $value)
    {
        $this->identidad = $value;
    }
    public function toDictionary()
    {
        return [
            "nombre" => $this->nombre,
            "correo" => $this->correo,
            "telefono" => $this->telefono,
            "identidad" => $this->identidad
        ];
    }

    public function __construct()
    {
        $this->nombre = "";
        $this->correo = "";
        $this->identidad = "";
        $this->telefono = "";
    }
}
