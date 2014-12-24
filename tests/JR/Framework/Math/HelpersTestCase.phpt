<?php

namespace JR\Tests\Framework\Math;

use JR\Framework\Testing\TestCase,
	JR\Framework\Math\Helpers,
	Tester\Assert;

require_once __DIR__ . '/../../../bootstrap.php';

/**
 * Math helpers utility class tests.
 * 
 * @author	RebendaJiri
 * @package JR\Framework
 * 
 * @testCase
 */
class HelpersTestCase extends TestCase
{
	public function testMean()
	{
		$testValues = array(
			array(
				'values' => array(1, 2, 3, 4, 5),
				'expected' => 3,
			),
			array(
				'values' => array(1, 1, 2, 5),
				'expected' => 2.25,
			),
			array(
				'values' => array(0.1, 1, 0.4),
				'expected' => 0.5,
			),
		);
		
		foreach ($testValues as $data) {
			$values = $data['values'];
			$expected = $data['expected'];
			
			Assert::same($expected, Helpers::mean($values));
		}
	}
	
	public function testMeanOfNoValuesThrowsException()
	{
		Assert::throws(function () {
			$values = array();
			
			Helpers::mean($values);
		}, 'DomainException', 'Mean of an empty array is undefined.');
	}
	
	public function testMedian()
	{
		$testValues = array(
			array(
				'values' => array(0),
				'expected' => 0,
			),
			array(
				'values' => array(1, 2, 3, 4, 5),
				'expected' => 3,
			),
			array(
				'values' => array(1, 1, 2, 5),
				'expected' => 1.5,
			),
			array(
				'values' => array(0.1, 0.1, 0.4, 0.41, 0.5, 1),
				'expected' => 0.405,
			),
		);
		
		foreach ($testValues as $data) {
			$values = $data['values'];
			$expected = $data['expected'];
			
			Assert::same($expected, Helpers::median($values));
		}
	}
	
	public function testMedianOfNoValuesThrowsException()
	{
		Assert::throws(function () {
			$values = array();
			
			Helpers::median($values);
		}, 'DomainException', 'Median of an empty array is undefined.');
	}
	
	public function testStandardDeviation()
	{
		$testValues = array(
			array(
				'values' => array(0),
				'expected' => 0,
			),
			array(
				'values' => array(2, 4, 5, 6, 8),
				'expected' => sqrt(5),
			),
			array(
				'values' => array(4, 5, 5, 4, 4, 2, 2, 6),
				'expected' => sqrt(2),
			),
			array(
				'values' => array(3, 7, 5, 12, 3),
				'expected' => sqrt(14),
			),
		);
		
		foreach ($testValues as $data) {
			$values = $data['values'];
			$expected = $data['expected'];
			
			Assert::same($expected, Helpers::standardDeviation($values));
		}
	}
	
	public function testStandardDeviationOfNoValuesThrowsException()
	{
		Assert::throws(function () {
			$values = array();
			
			Helpers::standardDeviation($values);
		}, 'DomainException', 'Standard deviation of no values is undefined.');
	}
	
	public function testToPercent()
	{
		$testValues = array(
			array(
				'value' => 1,
				'expected' => 100.0,
			),
			array(
				'value' => 0.055,
				'expected' => 5.5,
			),
			array(
				'value' => 0.12456,
				'expected' => 12.46,
			),
		);
		
		foreach ($testValues as $data) {
			$value = $data['value'];
			$expected = $data['expected'];
			
			Assert::same($expected, Helpers::toPercent($value));
		}
	}
	
	public function testToPercentWithRounding()
	{
		$testValues = array(
			array(
				'value' => 0.000001,
				'expected' => 0.0,
			),
			array(
				'value' => 1,
				'expected' => 100.0,
			),
			array(
				'value' => 0.0553227,
				'expected' => 5.532,
			),
			array(
				'value' => 0.1245678,
				'expected' => 12.457,
			),
		);
		
		foreach ($testValues as $data) {
			$value = $data['value'];
			$expected = $data['expected'];
			
			Assert::same($expected, Helpers::toPercent($value, 3));
		}
	}
	
	public function testToPercentInvalidPrecisionThrowsException()
	{
		Assert::throws(function () {
			Helpers::toPercent(1.25, -50);
		}, 'InvalidArgumentException');
		
		Assert::throws(function () {
			Helpers::toPercent(1.25, 'abcd');
		}, 'InvalidArgumentException');
	}
}

$test = new HelpersTestCase();
$test->run();