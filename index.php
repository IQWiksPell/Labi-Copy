<?php

namespace alex_stepan;

ini_set('display_errors', 1);
error_reporting(-1);

include_once('alex_stepan/Alex_Stepan_Exception.php');
include_once('core/EquationInterface.php');
include_once('core/LogAbstract.php');
include_once('core/LogInterface.php');
include_once('alex_stepan/Linear.php');
include_once('alex_stepan/Square.php');
include_once('alex_stepan/MyLog.php');


echo "Please enter 3 parameters divided by space. \n";
$params = explode(" ", fgets(STDIN));

try {
	if (count($params) != 3) {
		throw new Alex_Stepan("Wrong parameter count. Please enter exactly 3 parameters.");
	}
	$a = (float)$params[0];
	$b = (float)$params[1];
	$c = (float)$params[2];
	if ($params[0] == 0) {
		MyLog::log("Linear equation: ".$b."x + ".$c." = 0");
		$linear = new Linear();
		MyLog::log("Answer: ".$linear->linear_equation($b, $c));	
	}
	else {
		MyLog::log("Square equation: ".$a."x^2 + ".$b."x + ".$c." = 0");
		$square = new Square();
		if (is_array($temp = $square->solve($a, $b, $c))) {
			MyLog::log("Answer: ". implode(" , ", $temp));
		}
		else {
			MyLog::log("Answer: ".$temp);
		}
	}	
}
catch (Alex_Stepan $e){
	MyLog::log($e->GetMessage());
}

MyLog::write()."\n";
