<?php

namespace JR\Framework\Math;

use Nette;

/**
 * Helper math calculations etc.
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
class Helpers extends Nette\Object
{
	/** @var int */
	const DEFAULT_PERCENTAGE_PRECISION = 2;
	
	/**
	 * Static class - cannot be instantiated.
	 */
	final public function __construct()
	{
		throw new Nette\StaticClassException();
	}
	
	/**
	 * Returns mean of given array values.
	 * 
	 * @param array $values
	 * @return float
	 * @throws \DomainException If an empty values array is passed.
	 */
	public static function mean(array $values)
	{
		$count = count($values);
		if ($count == 0) {
			throw new \DomainException('Mean of an empty array is undefined.');
		}
		$sum = array_sum($values);
		return $sum / $count;
	}
	
	/**
	 * Returns median of given array values.
	 * 
	 * @see http://codereview.stackexchange.com/questions/220/calculate-a-median-too-much-code/223#223
	 * @param array $values
	 * @return mixed
	 * @throws \DomainException If an empty array is passed.
	 */
	public static function median(array $values)
	{
		$iCount = count($values);
		if ($iCount == 0) {
		  throw new \DomainException('Median of an empty array is undefined.');
		}
		$middle_index = floor($iCount / 2);
		sort($values, SORT_NUMERIC);
		$median = $values[$middle_index];
		if ($iCount % 2 == 0) {
			$median = ($median + $values[$middle_index - 1]) / 2;
		}
		return $median;
	}
	
	/**
	 * Calculates standard deviation of array values.
	 * 
	 * @see http://cad.cx/blog/2008/06/30/single-pass-standard-deviation-in-php/
	 * @param array $values
	 * @return float
	 */
	public static function standardDeviation($values)
	{
		if (count($values) == 0) {
			throw new \DomainException('Standard deviation of no values is undefined.');
		}
		$n = 0;
		$mean = 0;
		$M2 = 0;
		foreach ($values as $x) {
			$n++;
			$delta = $x - $mean;
			$mean = $mean + $delta/$n;
			$M2 = $M2 + $delta*($x - $mean);
		}
		if ($n <= 1) {
			return 0;
		}
		$variance = $M2 / ($n - 1);
		return sqrt($variance);
	}
	
	/**
	 * Converts passed $value to its percentage formusing optionally specified precision.
	 * 
	 * @param float $value
	 * @param int $precision
	 * @return float
	 * @throws \InvalidArgumentException If given value is not numeric or precision is negative.
	 */
	public static function toPercent($value, $precision = self::DEFAULT_PERCENTAGE_PRECISION)
	{
		if (!is_numeric($value)) {
			throw new \InvalidArgumentException("Invalid \$value argument value - numeric value expected, value of '" . gettype($value) . "' type given.");
		}
		if ($precision < 0 || !is_numeric($precision)) {
			throw new \InvalidArgumentException("Invalid \$precision argument value - non-negative integer expected, value '{$precision}' given.");
		}
		$precision = (int) $precision;
		return number_format($value * 100, $precision) + 0;
	}
}