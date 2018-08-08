<?php

namespace ToWords\Grammar;

use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{

    /**
     * @dataProvider dataProviderGrammarForm
     *
     * @param int $number
     * @param string $expectedGrammarForm
     */
    public function testGrammarForm($number, $expectedGrammarForm): void
    {
        self::assertEquals($expectedGrammarForm, Form::grammarForm($number));
    }

    public function dataProviderGrammarForm(): array
    {
        return [
            [1, Form::SINGULAR],
            [2, Form::PLURAL],
            [3, Form::PLURAL],
            [4, Form::PLURAL],
            [5, Form::GENITIVE_PLURAL],
            [6, Form::GENITIVE_PLURAL],
            [7, Form::GENITIVE_PLURAL],
            [8, Form::GENITIVE_PLURAL],
            [9, Form::GENITIVE_PLURAL],
            [10, Form::GENITIVE_PLURAL],
            [11, Form::GENITIVE_PLURAL],
            [12, Form::GENITIVE_PLURAL],
            [13, Form::GENITIVE_PLURAL],
            [14, Form::GENITIVE_PLURAL],
            [15, Form::GENITIVE_PLURAL],
            [16, Form::GENITIVE_PLURAL],
            [17, Form::GENITIVE_PLURAL],
            [18, Form::GENITIVE_PLURAL],
            [19, Form::GENITIVE_PLURAL],
            [20, Form::GENITIVE_PLURAL],
            [20, Form::GENITIVE_PLURAL],
            [21, Form::GENITIVE_PLURAL],
            [22, Form::PLURAL],
            [23, Form::PLURAL],
            [24, Form::PLURAL],
            [25, Form::GENITIVE_PLURAL],
            [26, Form::GENITIVE_PLURAL],
            [27, Form::GENITIVE_PLURAL],
            [28, Form::GENITIVE_PLURAL],
            [29, Form::GENITIVE_PLURAL],
            [20, Form::GENITIVE_PLURAL],
            [30, Form::GENITIVE_PLURAL],
            [31, Form::GENITIVE_PLURAL],
            [32, Form::PLURAL],
            [33, Form::PLURAL],
            [34, Form::PLURAL],
            [35, Form::GENITIVE_PLURAL],
            [36, Form::GENITIVE_PLURAL],
            [37, Form::GENITIVE_PLURAL],
            [38, Form::GENITIVE_PLURAL],
            [39, Form::GENITIVE_PLURAL],
            [100, Form::GENITIVE_PLURAL],
            [101, Form::GENITIVE_PLURAL],
            [102, Form::PLURAL],
            [103, Form::PLURAL],
            [104, Form::PLURAL],
            [105, Form::GENITIVE_PLURAL],
            [106, Form::GENITIVE_PLURAL],
            [107, Form::GENITIVE_PLURAL],
            [108, Form::GENITIVE_PLURAL],
            [109, Form::GENITIVE_PLURAL]
        ];
    }
}
