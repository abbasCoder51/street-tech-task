<?php

namespace Classes;

use Classes\DataReader;

class CsvDataReader extends DataReader
{
    public function fetchData($data): void
    {
        $this->data = $data;
    }

    public function processData()
    {
        return $this->data;
    }
}