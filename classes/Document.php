<?php

namespace Classes;

use Classes\DataReader;

class Document
{
    /**
     * The DataReader instance related to the document.
     * 
     * @var DataReader
     */
    private DataReader $dataReader;

    /**
     * Constructor.
     * 
     * Initialise a DataReader object in the Document class.
     * 
     * @param DataReader $dataReader
     */
    function __construct(DataReader $dataReader)
    {
        $this->dataReader = $dataReader;
    }

    /**
     * Fetch data using the associated data reader.
     * 
     * @var mixed $data The data to be fetched.
     * @return void
     */
    public function fetch($data): void
    {
        $this->dataReader->fetchData($data);
    }

    /**
     * Process the data using the associated data reader.
     * 
     * @return void
     */
    public function process(): void
    {
        $this->dataReader->processData();
    }

    /**
     * Render the processed data with the associated data reader.
     * 
     * @return mixed The rendered data.
     */
    public function render()
    {
        return $this->dataReader->printData();
    }
}