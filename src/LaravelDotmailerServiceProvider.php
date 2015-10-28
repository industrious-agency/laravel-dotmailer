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
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerConfig();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$config = $this->app->config->get('dotmailer');

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

	/**
	 * Registers Configuration
	 */
	private function registerConfig()
	{
		$configPath = __DIR__ . '/../config/dotmailer.php';

		$this->publishes([$configPath => config_path('dotmailer.php')], 'dotmailer');
		$this->mergeConfigFrom($configPath, 'dotmailer');
	}
}
