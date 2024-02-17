<?php

use Classes\CsvDataReader;
use Classes\Document;

require_once 'autoload.php';

$document = new Document(new CsvDataReader());
$document->fetch("files/examples-284-29-1-.csv");
$document->process();
echo print_r($document->render());