<?php

namespace ToWords\Transformer;

use PHPUnit\Framework\TestCase;
use ToWords\Dictionary\Feminine as FeminineDictionary;
use ToWords\Inflect\Exponent;
use ToWords\Inflect\Fractional as FractionalInflect;
use ToWords\Service\TripletsSplitter;
use ToWords\Transformer\Triplet\Fractional as FractionalTriplet;

class FractionalTest extends TestCase
{

    /**
     * @var Fractional
     */
    private static $transformer;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$transformer = (new Fractional())
            ->setFractionalInflect(new FractionalInflect())
            ->setSeparatorWords(' ')
            ->setTripletsSplitter(new TripletsSplitter())
            ->setInflect(new Exponent())
            ->setTriplesTransformer(new FractionalTriplet(new FeminineDictionary(), ' '));
    }

    /**
     * @dataProvider dataProviderToWords
     *
     * @param int|string $number
     * @param string $expectedWords
     */
    public function testToWords($number, $expectedWords): void
    {
        self::assertEquals($expectedWords, self::$transformer->toWords($number));
    }

    public function dataProviderToWords(): array
    {
        return [
            ['1', 'jedna dziesiąta'],
            ['2', 'dwie dziesiąte'],
            ['3', 'trzy dziesiąte'],
            ['4', 'cztery dziesiąte'],
            ['5', 'pięć dziesiątych'],
            ['10', 'dziesięć setnych'],
            ['11', 'jedenaście setnych'],
            ['12', 'dwanaście setnych'],
            ['21', 'dwadzieścia jeden setnych'],
            ['22', 'dwadzieścia dwie setne'],
            ['31', 'trzydzieści jeden setnych'],
            ['32', 'trzydzieści dwie setne'],
            ['01', 'jedna setna'],
            ['02', 'dwie setne'],
            ['03', 'trzy setne'],
            ['04', 'cztery setne'],
            ['05', 'pięć setnych']
        ];
    }
}
