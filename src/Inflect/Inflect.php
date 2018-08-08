<?php

namespace ToWords\Inflect;


interface Inflect
{
    public function inflect($number, $position): string;
}