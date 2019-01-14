<?php
/**
 * Created by PhpStorm.
 * User: fortegp05
 */

require_once './Wareki.php';

if ($argc < 2) return Wareki::ERROR_MSG;

$wareki = new Wareki();
echo $wareki->getWareki($argv[1]) . PHP_EOL;
