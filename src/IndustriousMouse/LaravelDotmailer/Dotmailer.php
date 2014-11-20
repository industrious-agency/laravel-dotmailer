<?php namespace IndustriousMouse\LaravelDotmailer;

use Config;
use Dotmailer\Config as DotmailerConfig;

/**
 * Class Dotmailer
 * @package IndustriousMouse\LaravelDotmailer
 */
class Dotmailer
{
	/**
	 * @var DotmailerConfig
	 */
	private $config;

	/**
	 * @var array
	 */
	private $instance = [];

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$config = Config::get('dotmailer::config');

		$this->config = new DotmailerConfig($config);
	}

	/**
	 * Resolve the class name and call an instance of the function
	 *
	 * @param $name
	 * @param $arguments
	 *
	 * @return mixed
	 */
	public function __call($name, $arguments)
	{
		$type = array_shift($arguments);

		if($type !== 'Entity')
		{
			$name .= $type;
		}

		$class = "Dotmailer\\{$type}\\{$name}";

		if(!isset($this->instance[$class]))
		{
			$this->instance[$class] = new $class($this->config);
		}

		return $this->instance[$class];
	}
}
