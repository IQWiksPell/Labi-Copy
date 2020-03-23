<?php
require_once __DIR__ .'/../vendor/autoload.php';
use alex_stepan as al_st;
use PHPUnit\Framework\TestCase;

final class SquareTest extends TestCase 
{
	protected $SquareObject;
	
	protected function setUp(): void
	{
		$this->SquareObject = new al_st\Square();
	}
	
	/**
     * @dataProvider squareProvider
     */
	
	public function testValidSquareFunction($a, $b, $c, $d): void
	{
		$this->assertEquals($d, $this->SquareObject->solve($a, $b, $c));
	}
	
	public function SquareProvider()
	{
		return [
		[-2,4,5, [-0.87, 2.87]],
		[4,-9,3, [1.84, 0.41]],
		[5,6,-3, [0.38, -1.58]]
		];
	}
	
	/**
     * @dataProvider squareProvider2
     */
	
	public function testInvalidSquareFunction($a, $b, $c): void
	{
		$this->expectExceptionMessage('Negative discriminant.');
		$this->SquareObject->solve($a, $b, $c);
	}
	
	public function SquareProvider2()
	{
		return [
		[1,1,1],
		[9000,-199,199],
		[1234,24,24]
		];
	}
}
?>