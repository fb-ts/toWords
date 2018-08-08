<?php

namespace ToWords\Grammar;


class Form
{
    public const SINGULAR = 'singular';
    public const PLURAL = 'plural';
    public const GENITIVE_PLURAL = 'genitive_plural';

    /**
     * Get grammar form of the number
     *
     * @param int $number
     * @return string
     */
    public static function grammarForm($number): string
    {
        if ($number === 1) {
            return self::SINGULAR;
        }

        $units = $number % 10;
        $tens = (int)($number / 10) % 10;

        if ($tens === 1 && $units > 1) {
            return self::GENITIVE_PLURAL;
        }
        if ($units >= 2 && $units <= 4) {
            return self::PLURAL;
        }
        return self::GENITIVE_PLURAL;
    }
}