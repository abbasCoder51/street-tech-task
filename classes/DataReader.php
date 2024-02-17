<?php

namespace Classes;

use Interfaces\FetchDataInterface;
use Interfaces\PrintDataInterface;
use Interfaces\ProcessDataInterface;

abstract class DataReader implements FetchDataInterface, ProcessDataInterface, PrintDataInterface
{
    protected $data;

    public function fetchData($data): void
    {
        $this->data = $data;
    }

    public function processData(): void
    {
        $this->data;
    }

    public function printData()
    {
        return $this->data;
    }
}