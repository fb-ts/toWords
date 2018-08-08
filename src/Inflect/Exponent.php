<?php

namespace ToWords\Inflect;

use ToWords\Grammar\Form;

class Exponent implements Inflect
{
    private static $exponent = [
        0 => [Form::SINGULAR => '', Form::PLURAL => '', Form::GENITIVE_PLURAL => ''],
        1 => [Form::SINGULAR => 'tysiąc', Form::PLURAL => 'tysiące', Form::GENITIVE_PLURAL => 'tysięcy'],
        2 => [Form::SINGULAR => 'milion', Form::PLURAL => 'miliony', Form::GENITIVE_PLURAL => 'milionów'],
    ];


    public function inflect($number, $power): string
    {
        $grammarForm = Form::grammarForm($number);
        return self::$exponent[$power][$grammarForm];
    }

}