<?php

namespace Classes;

use Interfaces\FetchDataInterface;
use Interfaces\PrintDataInterface;
use Interfaces\ProcessDataInterface;

abstract class DataReader implements FetchDataInterface, ProcessDataInterface, PrintDataInterface
{
    /**
     * Data from the reader.
     * 
     * @var mixed
     */
    protected $data;

    /**
     * Fetch the data from the reader.
     * 
     * @return void
     */
    public function fetchData($data): void
    {
        $this->data = $data;
    }

    /**
     * Process the data in the object.
     * 
     * @return void
     */
    public function processData(): void
    {
        $this->data;
    }

    /**
     * Return the data in the object.
     * 
     * @return mixed
     */
    public function printData()
    {
        return $this->data;
    }
}