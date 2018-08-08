<?php

namespace ToWords\Service;

use PHPUnit\Framework\TestCase;

class TripletsSplitterTest extends TestCase
{

    /**
     * @var TripletsSplitter
     */
    private static $splitter;

    public static function setUpBeforeClass()
    {
        self::$splitter = new TripletsSplitter();
        parent::setUpBeforeClass();
    }

    /**
     * @dataProvider dataProviderSplit
     *
     * @param int $number
     * @param int[] $expectedTriplets
     */
    public function testSplit($number, $expectedTriplets): void
    {
        self::assertEquals($expectedTriplets, self::$splitter->split($number));
    }

    public function dataProviderSplit(): array {
        return [
            [1, [1]],
            [100, [100]],
            [1000, [1, 0]],
            [1001, [1, 1]],
            [10000, [10, 0]],
            [22222, [22, 222]],
            [123456, [123, 456]],
            [1234567, [1, 234, 567]]
        ];
    }
}
