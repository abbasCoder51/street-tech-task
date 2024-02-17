<?php

namespace Classes;

use Classes\DataReader;

class Document
{
    private DataReader $dataReader;

    function __construct(DataReader $dataReader)
    {
        $this->dataReader = $dataReader;
    }

    public function fetch($data): void
    {
        $this->dataReader->fetchData($data);
    }

    public function process(): void
    {
        $this->dataReader->processData();
    }

    public function render()
    {
        return $this->dataReader->printData();
    }
}