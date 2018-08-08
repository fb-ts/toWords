<?php

namespace ToWords\Dictionary;


interface Dictionary
{
    /**
     *
     * @return string
     */
    public function zero(): string;

    /**
     * @param int $unit
     *
     * @return string
     */
    public function unit($unit): string;

    /**
     * @param int $ten
     *
     * @return string
     */
    public function ten($ten): string;

    /**
     * @param int $teen
     *
     * @return string
     */
    public function teen($teen): string;

    /**
     * @param int $hundred
     *
     * @return string
     */
    public function hundred($hundred): string;
}