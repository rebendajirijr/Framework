<?php

namespace JR\Framework\Http;

use Nette,
	Nette\Utils\Strings,
	JR\Framework\InvalidArgumentException;

/**
 * Description of ServerInfoHelper
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
class ServerInfoHelper extends Nette\Object
{
	/** @var string */
	const INFO_HTTP_HOST = 'HTTP_HOST',
		  INFO_HTTP_REFERER = 'HTTP_REFERER',
		  INFO_HTTP_USER_AGENT = 'HTTP_USER_AGENT',
		  INFO_REMOTE_ADDR = 'REMOTE_ADDR',
		  INFO_REQUEST_URI = 'REQUEST_URI';
	
	public function __construct()
	{
		throw new Nette\StaticClassException();
	}
	
	/**
	 * Returns $_SERVER[$info] value (if available).
	 * 
	 * @param string $info $_SERVER[$info] key
	 * @param bool $need
	 * @return string|NULL
	 * @throws InvalidArgumentException If given $info key is not string.
	 * @throws Nette\OutOfRangeException If given $info key does not exist.
	 */
	public static function getServerInfo($info, $need = FALSE)
	{
		if (!is_string($info)) {
			throw new InvalidArgumentException('The $info argument value must be string, ' . gettype($info) . ' given.');
		}
		$info = Strings::upper($info);
		if (!array_key_exists($info, $_SERVER)) {
			if ($need) {
				throw new Nette\OutOfRangeException("Given info variable with name '$info' is not set in '\$_SERVER' variable.");
			}
			return NULL;
		}
		return $_SERVER[$info];
	}
}