<?php

use Classes\CsvDataReader;

require_once 'autoload.php';

$csvDataReader = new CsvDataReader();
$csvDataReader->fetchData('testting');
echo $csvDataReader->processData();