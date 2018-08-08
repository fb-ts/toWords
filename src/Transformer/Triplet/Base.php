<?php

namespace ToWords\Transformer\Triplet;

use ToWords\Dictionary\Dictionary;

/**
 * Convert decimal to words
 */
class Base
{
    /**
     * @var Dictionary
     */
    protected $dictionary;

    /**
     * @var string
     */
    protected $separatorWords;

    /**
     * Base Triplet constructor
     *
     * @param Dictionary $dictionary
     * @param string $separatorWords
     */
    public function __construct(Dictionary $dictionary, string $separatorWords)
    {
        $this->dictionary = $dictionary;
        $this->separatorWords = $separatorWords;
    }

    /**
     * Convert decimal to words
     *
     * @param int $number
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

        if ($units > 0 && $tens !== 1) {
            $words[] = $this->dictionary->unit($units);
        }

        return implode($this->separatorWords, $words);
    }

    public function getDictionary(): Dictionary
    {
        return $this->dictionary;
    }
}