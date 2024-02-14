<?php

namespace Classes;

use Classes\DataReader;
use Exception;

class CsvDataReader extends DataReader
{
    public function fetchData($data): void
    {
        $dataArray = [];

        try {
            $file = fopen($data,"r");

            while(!feof($file)) {
                $dataArray[] = fgets($file);
            }

            fclose($file);
        }
        catch(Exception $e) {
            throw new Exception("File Not Found");
        }

        $this->data = $dataArray;
    }

    public function processData()
    {
        return $this->data;
    }
}