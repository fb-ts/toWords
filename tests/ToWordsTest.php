<?php

namespace ToWords;

use PHPUnit\Framework\TestCase;

class ToWordsTest extends TestCase
{
    /** @var ToWords */
    private static $toWords;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$toWords = new ToWords();
    }

    /**
     * Test convert number to words
     * @dataProvider dataProviderToWords
     *
     * @param int|string $number
     * @param string $expectedWords
     */
    public function testToWords($number, $expectedWords): void
    {
        self::assertEquals($expectedWords, self::$toWords->toWords($number));
    }

    /**
     * Data provider to testToWords
     *
     * @return array
     */
    public function dataProviderToWords(): array
    {
        return [
            [0, 'zero'],
            [1, 'jeden'],
            [2, 'dwa'],
            [3, 'trzy'],
            [4, 'cztery'],
            [5, 'pięć'],
            [20, 'dwadzieścia'],
            [21, 'dwadzieścia jeden'],
            [1234567, 'milion dwieście trzydzieści cztery tysiące pięćset sześćdziesiąt siedem'],
            [3248518, 'trzy miliony dwieście czterdzieści osiem tysięcy pięćset osiemnaście'],
            ['0,0', 'zero'],
            ['0,00', 'zero'],
            ['1,0', 'jeden'],
            ['1,00', 'jeden'],
            ['2,01', 'dwa i jedna setna'],
            ['3,02', 'trzy i dwie setne'],
            ['4,03', 'cztery i trzy setne'],
            ['5,04', 'pięć i cztery setne'],
            ['6,10', 'sześć i dziesięć setnych'],
            ['7,11', 'siedem i jedenaście setnych'],
            ['8,18', 'osiem i osiemnaście setnych'],
            ['9,9', 'dziewięć i dziewięć dziesiątych'],
            ['10,21', 'dziesięć i dwadzieścia jeden setnych'],
            ['11,32', 'jedenaście i trzydzieści dwie setne'],
            ['12,43', 'dwanaście i czterdzieści trzy setne'],
            ['13,54', 'trzynaście i pięćdziesiąt cztery setne'],
            ['14,65', 'czternaście i sześćdziesiąt pięć setnych'],
            ['15,76', 'piętnaście i siedemdziesiąt sześć setnych'],
            ['16,87', 'szesnaście i osiemdziesiąt siedem setnych'],
            ['17,99', 'siedemnaście i dziewięćdziesiąt dziewięć setnych'],
            ['18,20', 'osiemnaście i dwadzieścia setnych'],
            ['19,2', 'dziewiętnaście i dwie dziesiąte'],
            ['20,70', 'dwadzieścia i siedemdziesiąt setnych'],
            ['21,7', 'dwadzieścia jeden i siedem dziesiątych'],
            ['100', 'sto'],
            ['101', 'sto jeden'],
            ['1234,56', 'tysiąc dwieście trzydzieści cztery i pięćdziesiąt sześć setnych'],
            ['1234567,89', 'milion dwieście trzydzieści cztery tysiące pięćset sześćdziesiąt siedem i osiemdziesiąt dziewięć setnych'],
            ['900099000,9', 'dziewięćset milionów dziewięćdziesiąt dziewięć tysięcy i dziewięć dziesiątych'],
            ['123456789,01', 'sto dwadzieścia trzy miliony czterysta pięćdziesiąt sześć tysięcy siedemset osiemdziesiąt dziewięć i jedna setna'],
        ];
    }
}
