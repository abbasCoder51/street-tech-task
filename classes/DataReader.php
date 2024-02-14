<?php

namespace Classes;

use Interfaces\FetchDataInterface;
use Interfaces\ProcessDataInterface;

abstract class DataReader implements FetchDataInterface, ProcessDataInterface
{
    protected $data;

    public function fetchData($data): void
    {
        $this->data = $data;
    }

    public function processData()
    {
        return $this->data;
    }
}