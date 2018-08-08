<?php

namespace ToWords\Dictionary;


class Feminine extends Base
{
    protected static $units = [
        0 => '',
        1 => 'jedna',
        2 => 'dwie',
        3 => 'trzy',
        4 => 'cztery',
        5 => 'pięć',
        6 => 'sześć',
        7 => 'siedem',
        8 => 'osiem',
        9 => 'dziewięć'
    ];


    /**
     * @param int $unit
     *
     * @return string
     */
    public function unitBaseForm($unit): string
    {
        return parent::$units[$unit];
    }
}