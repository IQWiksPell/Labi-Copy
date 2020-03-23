<?php

namespace alex_stepan;

class Square extends Linear implements \core\EquationInterface{
	private $num;
	private $result;
	protected function disc($a,$b,$c){
		return pow($b,2) - (4 * $a * $c);
	}
	public function solve($a,$b,$c){
		if ($a == 0){
			return $this->linear_equation($b,$c);
		} else {
			$disc = $this->disc($a,$b,$c);
			if ($disc < 0){
				$this->result = false;
				throw new Alex_Stepan('Negative discriminant.');
			} elseif ($disc > 0){
				$this->result= array();
				$this->result[]=round(((-$b + sqrt($disc)) / (2 * $a)),2);
				$this->result[]=round(((-$b - sqrt($disc)) / (2 * $a)),2);
				return $this->result;
			} else {
				$this->result = ((-$b) / (2 * $a));
				return $this->result;
			}
		}
	}
}

