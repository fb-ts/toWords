<?php

namespace ToWords\Dictionary;


class Base implements Dictionary
{
    protected static $units = [
        0 => '',
        1 => 'jeden',
        2 => 'dwa',
        3 => 'trzy',
        4 => 'cztery',
        5 => 'pięć',
        6 => 'sześć',
        7 => 'siedem',
        8 => 'osiem',
        9 => 'dziewięć'
    ];
    protected static $teens = [
        0 => 'dziesięć',
        1 => 'jedenaście',
        2 => 'dwanaście',
        3 => 'trzynaście',
        4 => 'czternaście',
        5 => 'piętnaście',
        6 => 'szesnaście',
        7 => 'siedemnaście',
        8 => 'osiemnaście',
        9 => 'dziewiętnaście'
    ];
    protected static $tens = [
        0 => '',
        1 => 'dziesięć',
        2 => 'dwadzieścia',
        3 => 'trzydzieści',
        4 => 'czterdzieści',
        5 => 'pięćdziesiąt',
        6 => 'sześćdziesiąt',
        7 => 'siedemdziesiąt',
        8 => 'osiemdziesiąt',
        9 => 'dziewięćdziesiąt'
    ];
    protected static $hundreds = [
        0 => '',
        1 => 'sto',
        2 => 'dwieście',
        3 => 'trzysta',
        4 => 'czterysta',
        5 => 'pięćset',
        6 => 'sześćset',
        7 => 'siedemset',
        8 => 'osiemset',
        9 => 'dziewięćset'
    ];


    /**
     *
     * @return string
     */
    public function zero(): string
    {
        return 'zero';
    }

    /**
     * @param int $unit
     *
     * @return string
     */
    public function unit($unit): string
    {
        return static::$units[$unit];
    }

    /**
     * @param int $ten
     *
     * @return string
     */
    public function ten($ten): string
    {
        return static::$tens[$ten];
    }

    /**
     * @param int $teen
     *
     * @return string
     */
    public function teen($teen): string
    {
        return static::$teens[$teen];
    }

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function hundred($hundred): string
    {
        return static::$hundreds[$hundred];
    }
}