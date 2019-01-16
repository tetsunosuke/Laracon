<?php
/**
 * Created by PhpStorm.
 * User: fortegp05
 */

use LaravelJpCon\Q001\Wareki;

require_once __DIR__ . '/../../../vendor/autoload.php';

if ($argc < 2) return Wareki::ERROR_MSG;

$wareki = new Wareki();
echo $wareki->getWareki($argv[1]) . PHP_EOL;
