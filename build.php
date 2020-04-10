<?php
if (!is_dir("./Log")) mkdir("./Log");
file_put_contents("./Log/TestLog.log", "");
shell_exec("composer install");
shell_exec("%CD%/vendor/bin/phpunit tests >> %CD%/Log/TestLog.log");
file_put_contents("./version", trim(shell_exec('git symbolic-ref --short -q HEAD')));
