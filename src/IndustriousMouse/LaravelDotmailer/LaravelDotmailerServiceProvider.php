<?php namespace IndustriousMouse\LaravelDotmailer;

use DotMailer\Api\Container;
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

		$config = Config::get('dotmailer::config');

		$credentials = array(
			Container::USERNAME			=> $config['username'],
			Container::PASSWORD			=> $config['password']
		);

		$this->app->singleton('dotmailer', function() use($credentials)
		{
			return Container::newResources($credentials);
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