<?php

namespace JR\Framework\Utils;

use Nette;
use Nette\StaticClassException;
use JR\Framework\InvalidArgumentException;

/**
 * Array utility class.
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
class Arrays extends Nette\Object
{
	public function __construct()
	{
		throw new StaticClassException();
	}
	
	/**
	 * Search for given values in array and replaces them with specified value.
	 * 
	 * @param array $haystack
	 * @param mixed $search
	 * @param mixed $replacement
	 * @param bool $strict
	 * @return array
	 */
	public static function replaceValues(array $haystack, $search, $replacement, $strict = TRUE)
	{
		$ret = array_replace(
			$haystack,
			array_fill_keys(
				array_keys($haystack, $search, $strict),
				$replacement
			)
		);
		return $ret;
	}
	
	/**
	 * Creates multidimensional array dynamically from given input values.
	 * 
	 * @param array $input
	 * @return array
	 */
	public static function createMultiDynamicArray(array $input)
	{
		$ret = array();
		$lastArray = &$ret;
		for ($i = 0; $i < count($input); $i++) {
			$lastArray[$input[$i]] = array();
			$lastArray = &$lastArray[$input[$i]];
		}
		return $ret;
	}
	
	/**
	 * Tries to get value from $array by $key and sets that value as object property.
	 * 
	 * @param object
	 * @param array
	 * @param string
	 * @param bool
	 * @return void
	 * @throws InvalidArgumentException If given $key does not exist in $array.
	 */
	public static function setObjectPropertyValueByValueFromArray($object, array $array, $key, $need = TRUE)
	{
		if (!array_key_exists($key, $array)) {
			if ($need) {
				throw new InvalidArgumentException("Missing '$key' in given array.");
			}
			return;
		}
		$object->$key = $array[$key];
	}
	
	/**
	 * @param array
	 * @param callable function ($key, $value) {}
	 * @return array
	 */
	public static function changeKeys(array $array, callable $callback)
	{
		$result = [];
		foreach ($array as $key => $value) {
			$newKey = call_user_func($callback, $key, $value);
			
			$result[$newKey] = $value;
			unset($array[$key]);
		}		
		return $result;
	}
	
	/**
	 * @param array
	 * @param callable
	 * @return array
	 */
	public static function changeValues(array $array, callable $callback)
	{
		$result = [];
		foreach ($array as $key => $value) {
			$result[$key] = call_user_func($callback, $key, $value);
		}
		return $result;
	}
}