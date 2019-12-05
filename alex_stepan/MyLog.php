<?php

namespace alex_stepan;

class MyLog extends \core\LogAbstract implements \core\LogInterface {
	public static function log($str) {
		self::Instance()->log[] = $str;
	}
	public function _write() {
		echo implode ("\n", self::Instance()->log);
		
		$d = new \DateTime();
		if (!is_dir("./Log")) mkdir("./Log");
		$filename = $d->format('d-m-Y\TH-i-s.u').".log";
		file_put_contents("./Log/".$filename, implode ("\n", self::Instance()->log));
	}
	public static function write() {
		self::Instance()->_write();
	}
}

