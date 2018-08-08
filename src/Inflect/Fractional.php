<?php

namespace ToWords\Inflect;

use ToWords\Grammar\Form;

class Fractional implements Inflect
{
    private static $fractional = [
        1 => [Form::SINGULAR => 'dziesiąta', Form::PLURAL => 'dziesiąte', Form::GENITIVE_PLURAL => 'dziesiątych'],
        2 => [Form::SINGULAR => 'setna', Form::PLURAL => 'setne', Form::GENITIVE_PLURAL => 'setnych'],
    ];


    public function inflect($number, $decimalPlace): string
    {
        $grammarForm = Form::grammarForm($number);
        return self::$fractional[$decimalPlace][$grammarForm];
    }

}