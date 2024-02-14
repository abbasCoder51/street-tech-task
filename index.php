<?php

use Classes\CsvDataReader;

require_once 'autoload.php';

$csvDataReader = new CsvDataReader();
$csvDataReader->fetchData("files/examples-284-29-1-.csv");
$csvDataReader->processData();
#echo $csvDataReader->processData();