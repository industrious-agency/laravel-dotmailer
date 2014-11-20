<?php namespace IndustriousMouse\LaravelDotmailer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class LaravelDotmailerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Boot the package
		$this->package('industrious-mouse/laravel-dotmailer', 'dotmailer');

		$this->app->singleton('dotmailer', function()
		{
			return new Dotmailer;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
