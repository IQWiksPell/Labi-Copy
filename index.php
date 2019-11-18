<?php

class Alex_Stepan extends RuntimeException {};

class A {
	private $result;
	public function linear_equation($a,$b){
		if ($a == 0){
			throw new Alex_Stepan('Деление на нуль.');
		} else {
			$this->result = (-$b/$a);
			return $this->result;
		}
	}
}

class B extends A {
	private $num;
	private $result;
	public function __construct($a){
		$this->num = $a;
	}
	protected function disc($a,$b,$c){
		return (pow($b,2) - (4 * $a * $c));
	}
	public function square_equation($a,$b,$c){
		if ($a == 0){
			return $this->linear_equation($b,$c);
		} else {
			$disc = $this->disc($a,$b,$c);
			if ($disc < 0){
				$this->result = false;
				throw new Alex_Stepan('Отрицательный дискриминант.');
			} elseif ($disc > 0){
				$this->result= array();
				$this->result[]=((-$b + sqrt($disc)) / (2 * $a));
				$this->result[]=((-$b - sqrt($disc)) / (2 * $a));
				return $this->result;
			} else {
				$this->result = ((-$b) / (2 * $a));
				return $this->result;
			}
		}
	}
}
	
class C extends B{
	private $num2;
	public function __construct($a,$b){
		$this->num2 = $b;
		parent::__construct($a);
	}
}

$ob1 = new A();
$ob3 = new B($ob1);
try {
	var_dump ($ob1->linear_equation(8,10));
	echo '<br>';
	var_dump ($ob3->square_equation(1,20,9));
} catch (Alex_Stepan $e) {
	echo "Ошибка в файле ".$e->GetFile()." на строке ".$e->GetLine()." по причине ".$e->GetMessage();
}

/*$ob4 = new A();
$ob2 = new B($ob1);
$ob3 = new B($ob2);
$ob5 = new C($ob3,$ob4);

echo '<pre>';
var_dump($ob5);
echo '</pre>';*/
?>