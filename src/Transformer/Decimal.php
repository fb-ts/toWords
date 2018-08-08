<?php

namespace ToWords\Transformer;


use ToWords\Inflect\Inflect;
use ToWords\Service\TripletsSplitter;
use ToWords\Transformer\Triplet\Base;

class Decimal implements Transformer
{
    /** @var string */
    protected $separatorWords;

    /** @var TripletsSplitter */
    protected $tripletsSplitter;

    /** @var Base */
    protected $triplesTransformer;

    /** @var Inflect */
    protected $inflect;


    /**
     * @param string $separatorWords
     * @return Decimal
     */
    public function setSeparatorWords(string $separatorWords): Decimal
    {
        $this->separatorWords = $separatorWords;
        return $this;
    }

    /**
     * @param TripletsSplitter $tripletsSplitter
     * @return Decimal
     */
    public function setTripletsSplitter(TripletsSplitter $tripletsSplitter): Decimal
    {
        $this->tripletsSplitter = $tripletsSplitter;
        return $this;
    }

    /**
     * @param Base §$triplesTransformer
     * @return Decimal
     */
    public function setTriplesTransformer(Base $triplesTransformer): Decimal
    {
        $this->triplesTransformer = $triplesTransformer;
        return $this;
    }

    /**
     * @param Inflect $inflect
     * @return Decimal
     */
    public function setInflect(Inflect $inflect): Decimal
    {
        $this->inflect = $inflect;
        return $this;
    }

    /**
     * @param int|string $number
     * @return string
     */
    public function toWords($number): string
    {
        if ((int)$number === 0) {
            return $this->triplesTransformer->getDictionary()->zero();
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
        $words = [];
        $triplets = $this->tripletsSplitter->split($number);

        $count = \count($triplets);

        foreach ($triplets as $i => $triplet) {
            if ($triplet > 0) {
                if (!($triplet === 1 && $i !== ($count - 1))) {
                    $words[] = $this->triplesTransformer->toWords($triplet);
                }
                $words[] = $this->inflect->inflect($triplet, $count - $i - 1);
            }
        }
        return $words;
    }

    /**
     * @param string[] $words
     * @return string
     */
    protected function joinWords($words): string
    {
        return trim(implode($this->separatorWords, array_filter($words)));
    }

}