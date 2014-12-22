<?php

namespace JR\Framework\Utils;

use Nette;

/**
 * Description of Strings
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
final class Strings extends Nette\Object
{
	public function __construct()
	{
		throw new Nette\StaticClassException();
	}
	
	/**
	 * Determines whether the given value can be treated as a string.
	 * 
	 * @param mixed $value
	 * @return bool
	 */
	public static function canBeString($value)
	{
		if (is_object($value) && method_exists($value, '__toString')) {
			return true;
		}
		if (is_null($value)) {
			return true;
		}
		return is_scalar($value);
	}
}