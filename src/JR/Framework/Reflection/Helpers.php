<?php

namespace JR\Framework\Reflection;

use Nette;

/**
 * Reflection-like helpers.
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
class Helpers extends Nette\Object
{
	/**
	 * Invokes class method with specified arguments.
	 * 
	 * @param mixed $object
	 * @param array $args
	 * @return mixed
	 */
	public static function invokeMethodArgs($object, $method, array $args)
	{
		$classReflection = new Nette\Reflection\ClassType($object);
		$methodReflection = $classReflection->getMethod($method);
		return $methodReflection->invokeArgs($object, $args);
	}
}