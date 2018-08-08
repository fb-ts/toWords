<?php

namespace ToWords;

use ToWords\Transformer\Transformer;

class NumberTransformer
{
    /** @var Transformer */
    private $decimalTransformer;

    /** @var Transformer */
    private $fractionalTransformer;

    private $separatorFractionalPart;


    /**
     * @param int|string $number
     * @return string
     */
    public function toWords($number): string
    {
        [$decimal, $fraction] = explode(',', $number);

        $decimalWords = $this->decimalTransformer->toWords($decimal);
        $fractionWords = $this->fractionalTransformer->toWords($fraction);

        return implode($this->separatorFractionalPart, array_filter([$decimalWords, $fractionWords]));
    }


    /**
     * @param Transformer $decimalTransformer
     * @return NumberTransformer
     */
    public function setDecimalTransformer(Transformer $decimalTransformer): NumberTransformer
    {
        $this->decimalTransformer = $decimalTransformer;
        return $this;
    }

    /**
     * @param Transformer $fractionalTransformer
     * @return NumberTransformer
     */
    public function setFractionalTransformer(Transformer $fractionalTransformer): NumberTransformer
    {
        $this->fractionalTransformer = $fractionalTransformer;
        return $this;
    }

    /**
     * @param string $separatorFractionalPart
     * @return NumberTransformer
     */
    public function setSeparatorFractionalPart(string $separatorFractionalPart): NumberTransformer
    {
        $this->separatorFractionalPart = $separatorFractionalPart;
        return $this;
    }
}