<?php

namespace Classes;

use Classes\DataReader;
use Classes\PersonStructureFormatter as PersonStructureFormatter;
use Exception;

class CsvDataReader extends DataReader
{
    /**
     * Array of formatted data
     * 
     * @var array
     */
    private array $formattedData;

    /**
     * Instance of the PersonStructureFormatter class
     * 
     * @var PersonStructureFormatter
     */
    private PersonStructureFormatter $personStructureFormatter;

    /**
     * CsvDataReader constructor
     */
    function __construct()
    {
        $this->personStructureFormatter = new PersonStructureFormatter();
    }

    /**
     * Fetches the data from the specified file name and stores it in the data object
     * 
     * @param string $fileName The name of the file that is to be fetched
     * @throws Exeption If file is not found and cannot be opened
     * @return void
     */
    public function fetchData($fileName): void
    {
        $dataArray = [];

        try {
            $fileData = fopen($fileName,"r");

            while(!feof($fileData)) {
                $dataArray[] = fgets($fileData);
            }

            fclose($fileData);
        }
        catch(Exception $e) {
            throw new Exception("File Not Found");
        }

        unset($dataArray[0]);

        $this->data = array_values($dataArray);
    }

    /**
     * Processes the data stored in the data property in the object, formats it and
     * stores it into the formattedData property
     * 
     * @return void
     */
    public function processData(): void
    {
        $index = 0;

        foreach($this->data as $person) {
            if(empty($person)) {
                break;
            }

            $formattedValue = $this->personStructureFormatter->process($person);
            $formattedValue = is_array($formattedValue[0]) ? $formattedValue : [$formattedValue];

            foreach($formattedValue as $formattedValueItem) {
                $this->personStructureFormatter->initialise($formattedValueItem);
                $this->formattedData[] = $this->personStructureFormatter->display();
            }
            
            $index++;
        }
    }

    /**
     * Returns the formattedData property in the object
     * 
     * @return array
     */
    public function printData(): array
    {
        return $this->formattedData;
    }
}