<?php

namespace ToWords\Transformer\Triplet;

use ToWords\Dictionary\Feminine;

/**
 * Convert fractional to words
 */
class Fractional extends Base
{
    /**
     * @var Feminine
     */
    protected $dictionary;


    /**
     * Fractional Triplet constructor
     *
     * @param Feminine $dictionary
     * @param string $separatorWords
     */
    public function __construct(Feminine $dictionary, string $separatorWords)
    {
        parent::__construct($dictionary, $separatorWords);
    }

    /**
     * Convert fractional to words
     *
     * @param $number
     * @return string
     */
    public function toWords($number): string
    {
        $units = $number % 10;
        $tens = (int)($number / 10) % 10;
        $hundreds = (int)($number / 100) % 10;

        $words = [];

        if ($hundreds > 0) {
            $words[] = $this->dictionary->hundred($hundreds);
        }

        if ($tens === 1) {
            $words[] = $this->dictionary->teen($units);
        }

        if ($tens > 1) {
            $words[] = $this->dictionary->ten($tens);
        }

        if ($units > 0) {
            if ($tens === 0) {
                $words[] = $this->dictionary->unit($units);
            } elseif ($tens > 1) {
                if ($units === 2) {
                    $words[] = $this->dictionary->unit($units);
                } else {
                    $words[] = $this->dictionary->unitBaseForm($units);
                }
            }
        }

        return implode($this->separatorWords, $words);
    }
}