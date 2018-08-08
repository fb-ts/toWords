<?php

namespace ToWords;

use ToWords\Dictionary\Base as BaseDictionary;
use ToWords\Dictionary\Feminine as FeminineDictionary;
use ToWords\Inflect\Exponent;
use ToWords\Inflect\Fractional as FractionalInflect;
use ToWords\Service\TripletsSplitter;
use ToWords\Transformer\Decimal;
use ToWords\Transformer\Fractional;
use ToWords\Transformer\Triplet\Base as BaseTriplet;
use ToWords\Transformer\Triplet\Fractional as FractionalTriplet;

class ToWords
{
    protected $transformer;

    public function __construct()
    {
        $separatorWords = ' ';

        $decimalTransformer = (new Decimal())
            ->setSeparatorWords($separatorWords)
            ->setTripletsSplitter(new TripletsSplitter())
            ->setInflect(new Exponent())
            ->setTriplesTransformer(new BaseTriplet(new BaseDictionary(), $separatorWords));

        $fractionalTransformer = (new Fractional())
            ->setFractionalInflect(new FractionalInflect())
            ->setSeparatorWords($separatorWords)
            ->setTripletsSplitter(new TripletsSplitter())
            ->setInflect(new Exponent())
            ->setTriplesTransformer(new FractionalTriplet(new FeminineDictionary(), $separatorWords));

        $this->transformer = (new NumberTransformer())
            ->setDecimalTransformer($decimalTransformer)
            ->setFractionalTransformer($fractionalTransformer)
            ->setSeparatorFractionalPart(' i ');

    }

    /**
     * Convert number to words
     * @param int|string $number
     * @return string
     */
    public function toWords($number): string
    {
        return $this->transformer->toWords($number);
    }
}