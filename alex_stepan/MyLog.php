<?php

namespace alex_stepan;

class MyLog extends \core\LogAbstract implements \core\LogInterface {
	public static function log($str) {
		self::Instance()->log[] = $str;
	}
	public function _write() {
		echo implode ("\n", self::Instance()->log);
	}
	public static function write() {
		self::Instance()->_write();
	}
}

