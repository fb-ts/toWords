<?php

namespace ToWords\Transformer;


interface Transformer
{
    public function toWords($number): string;
}