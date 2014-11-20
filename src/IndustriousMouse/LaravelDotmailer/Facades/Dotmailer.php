<?php namespace IndustriousMouse\LaravelDotmailer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * LaravelDotmailer Facade
 *
 * @category   Laravel Dotmailer
 * @version    1.0.0
 * @package    industrious-mouse/laravel-dotmailer
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