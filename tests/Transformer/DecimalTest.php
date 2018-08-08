<?php

namespace ToWords\Transformer;

use PHPUnit\Framework\TestCase;
use ToWords\Dictionary\Base as BaseDictionary;
use ToWords\Inflect\Exponent;
use ToWords\Service\TripletsSplitter;
use ToWords\Transformer\Triplet\Base as BaseTriplet;

class DecimalTest extends TestCase
{

    /**
     * @var Decimal
     */
    private static $transformer;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$transformer = (new Decimal())
            ->setSeparatorWords(' ')
            ->setTripletsSplitter(new TripletsSplitter())
            ->setInflect(new Exponent())
            ->setTriplesTransformer(new BaseTriplet(new BaseDictionary(), ' '));
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
            [0, 'zero'],
            [1, 'jeden'],
            [2, 'dwa'],
            [3, 'trzy'],
            [4, 'cztery'],
            [5, 'pięć'],
            [6, 'sześć'],
            [7, 'siedem'],
            [8, 'osiem'],
            [9, 'dziewięć'],
            [10, 'dziesięć'],
            [11, 'jedenaście'],
            [12, 'dwanaście'],
            [13, 'trzynaście'],
            [14, 'czternaście'],
            [15, 'piętnaście'],
            [16, 'szesnaście'],
            [17, 'siedemnaście'],
            [18, 'osiemnaście'],
            [19, 'dziewiętnaście'],
            [20, 'dwadzieścia'],
            [21, 'dwadzieścia jeden'],
            [100, 'sto'],
            [101, 'sto jeden'],
            [199, 'sto dziewięćdziesiąt dziewięć'],
            [202, 'dwieście dwa'],
            [246, 'dwieście czterdzieści sześć'],
            [300, 'trzysta'],
            [303, 'trzysta trzy'],
            [357, 'trzysta pięćdziesiąt siedem'],
            [999, 'dziewięćset dziewięćdziesiąt dziewięć'],
            [1000, 'tysiąc'],
            [1001, 'tysiąc jeden'],
            [1099, 'tysiąc dziewięćdziesiąt dziewięć'],
            [1106, 'tysiąc sto sześć'],
            [1111, 'tysiąc sto jedenaście'],
            [2345, 'dwa tysiące trzysta czterdzieści pięć'],
            [3488, 'trzy tysiące czterysta osiemdziesiąt osiem'],
            [11001, 'jedenaście tysięcy jeden'],
            [21512, 'dwadzieścia jeden tysięcy pięćset dwanaście'],
            [90000, 'dziewięćdziesiąt tysięcy'],
            [92100, 'dziewięćdziesiąt dwa tysiące sto'],
            [101001, 'sto jeden tysięcy jeden'],
            [212121, 'dwieście dwanaście tysięcy sto dwadzieścia jeden'],
            [1001001, 'milion tysiąc jeden'],
            [1234567, 'milion dwieście trzydzieści cztery tysiące pięćset sześćdziesiąt siedem'],
            [3248518, 'trzy miliony dwieście czterdzieści osiem tysięcy pięćset osiemnaście'],
            ['3248518', 'trzy miliony dwieście czterdzieści osiem tysięcy pięćset osiemnaście'],
        ];
    }
}
