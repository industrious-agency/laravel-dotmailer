<?php

namespace IndustriousMouse\LaravelDotmailer;

use DotMailer\Api\Container;
use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelDotmailerServiceProvider
 * @package IndustriousMouse\LaravelDotmailer
 */
class LaravelDotmailerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
				__DIR__.'/../config/dotmailer.php' => config_path('dotmailer.php'),
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$config = $this->app->config->get('dotmailer.config');

		$credentials = [
			Container::USERNAME			=> $config['username'],
			Container::PASSWORD			=> $config['password']
		];

		$this->app->singleton('dotmailer', function() use($credentials) {
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