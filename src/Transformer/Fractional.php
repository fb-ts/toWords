<?php

namespace ToWords\Transformer;


use ToWords\Inflect\Fractional as FractionalInflect;

class Fractional extends Decimal
{

    /** @var FractionalInflect */
    private $fractionalInflect;

    /**
     * @param int|string $number
     * @return string
     */
    public function toWords($number): string
    {
        if ((int)$number === 0) {
            return '';
        }

        $words = $this->getWordsBySplittingIntoTriplets($number);

        return $this->joinWords($words);
    }

    /**
     * @param int|string $number
     * @return array
     */
    protected function getWordsBySplittingIntoTriplets($number): array
    {
        $words = parent::getWordsBySplittingIntoTriplets($number);

        if (!empty($words)) {
            $words[] = $this->fractionalInflect($number);
        }

        return $words;
    }

    /**
     * @param int|string $number
     * @return string
     */
    public function fractionalInflect($number): string
    {
        return $this->fractionalInflect->inflect((int)$number, \strlen($number));
    }

    /**
     * @param FractionalInflect $fractionalInflect
     * @return Fractional
     */
    public function setFractionalInflect(FractionalInflect $fractionalInflect): Fractional
    {
        $this->fractionalInflect = $fractionalInflect;
        return $this;
    }
}