<?php

namespace Uch\Oop\Hotel;

interface IHabitacion
{
    public function getPrecio(): float;
    public function toDictionary(): array;
}
