<?php

namespace C4P\Framework\Utils;

use Nette;

/**
 * Array utility class.
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
class Arrays extends Nette\Object
{
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
}