<?php

namespace Classes;

use Classes\DataReader;
use Classes\PersonStructureFormatter as PersonStructureFormatter;
use Exception;

class CsvDataReader extends DataReader
{
    private array $formattedData;

    private PersonStructureFormatter $personStructureFormatter;

    function __construct()
    {
        $this->personStructureFormatter = new PersonStructureFormatter();
    }

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

        unset($dataArray[0]);

        $this->data = array_values($dataArray);
    }

    public function processData(): void
    {
        $index = 0;
        // For each array item, split up the string into an array
        foreach($this->data as $person) {
            if($index == 4) {
                break;
            }
            $this->personStructureFormatter->format($person);
            $this->formattedData[] = $this->personStructureFormatter->display();
            $index++;
        }
    }

    public function printData()
    {
        return $this->formattedData;
    }
}