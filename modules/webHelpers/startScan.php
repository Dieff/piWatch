<?php
require('../config.php');

exec('python ../scripts/scheduler.py '
  . DB_USER . ':'
  . DB_PASSWORD  . '@'
  . DB_HOST
  . '  1> ../../temp/log 2> ../../temp/log &');

echo 1;

?>
