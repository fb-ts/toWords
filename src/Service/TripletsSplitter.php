<?php

namespace ToWords\Service;


class TripletsSplitter
{
    /**
     * Split the number to triplets
     *
     * @param int $number
     * @return array
     */
    public function split($number): array
    {
        $triplets = [];

        while ($number > 0) {
            $triplets[] = $number % 1000;
            $number = (int)($number / 1000);
        }

        return array_reverse($triplets);
    }
}