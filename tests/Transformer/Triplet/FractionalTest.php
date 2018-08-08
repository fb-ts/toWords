<?php

namespace ToWords\Transformer\Triplet;

use PHPUnit\Framework\TestCase;
use ToWords\Dictionary\Feminine;

class FractionalTest extends TestCase
{

    /**
     * @var Fractional
     */
    private static $fractional;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$fractional = new Fractional(new Feminine(), ' ');
    }

    /**
     * @dataProvider dataProviderToWords
     *
     * @param int|string $number
     * @param string $expectedWords
     */
    public function testToWords($number, $expectedWords): void
    {
        self::assertEquals($expectedWords, self::$fractional->toWords($number));
    }

    public function dataProviderToWords(): array
    {
        return [
            ['1', 'jedna'], // dziesiętna
            ['2', 'dwie'], // dziesiętne
            ['3', 'trzy'], // dziesiętne
            ['4', 'cztery'], // dziesiętne
            ['5', 'pięć'], // dziesiętnych
            ['10', 'dziesięć'], // setnych
            ['11', 'jedenaście'], // setnych
            ['12', 'dwanaście'], // setnych
            ['21', 'dwadzieścia jeden'], // setnych
            ['22', 'dwadzieścia dwie'], // setne
            ['31', 'trzydzieści jeden'], // setnych
            ['32', 'trzydzieści dwie'], // setne
            ['01', 'jedna'], // setna
            ['02', 'dwie'], // setne
            ['03', 'trzy'], // setne
            ['04', 'cztery'], // setne
            ['05', 'pięć'] // setnych
        ];
    }
}
