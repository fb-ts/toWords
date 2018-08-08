<?php

namespace ToWords\Transformer\Triplet;

use PHPUnit\Framework\TestCase;
use ToWords\Dictionary\Base as BaseDictionary;

class BaseTest extends TestCase
{

    /**
     * @var Base
     */
    private static $triplet;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$triplet = new Base(new BaseDictionary(), ' ');
    }

    /**
     * @dataProvider dataProviderToWords
     *
     * @param int $number
     * @param string $expectedWords
     */
    public function testToWords($number, $expectedWords): void
    {
        self::assertEquals($expectedWords, self::$triplet->toWords($number));
    }

    public function dataProviderToWords(): array
    {
        return [
            [1, 'jeden'],
            [2, 'dwa'],
            [10, 'dziesięć'],
            [11, 'jedenaście'],
            [20, 'dwadzieścia'],
            [21, 'dwadzieścia jeden'],
            [100, 'sto'],
            [101, 'sto jeden'],
            [110, 'sto dziesięć'],
            [121, 'sto dwadzieścia jeden'],
            [999, 'dziewięćset dziewięćdziesiąt dziewięć']
        ];
    }
}
