<?php

namespace IndustriousMouse\LaravelDotmailer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * LaravelDotmailer Facade
 * @package IndustriousMouse\LaravelDotmailer
 */
class Dotmailer extends Facade
{
    /**
     * Return facade accessor
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dotmailer';
    }
}