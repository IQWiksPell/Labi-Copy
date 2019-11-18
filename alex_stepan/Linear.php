<?php

namespace alex_stepan;

class Linear {
	private $result;
	public function linear_equation($a,$b){
		if ($a == 0){
			throw new Alex_Stepan('Division by zero.');
		} else {
			$this->result = (-$b/$a);
			return $this->result;
		}
	}
}

