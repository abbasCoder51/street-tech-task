<?php

use Classes\CsvDataReader;
use Classes\Document;

require_once 'autoload.php';

/**
 * Create new Document object.
 */
$document = new Document(new CsvDataReader());

/**
 * Fetch data from csv file, specified filename and location
 */
$document->fetch("files/examples-284-29-1-.csv");

/**
 * Process data from the document.
 */
$document->process();

/**
 * Print the data from the document.
 */
print_r($document->render());