<?php

namespace Interfaces;

interface FetchDataInterface 
{
    /**
     * Fetch the data.
     * 
     * @param mixed $data The data to be fetched.
     * @return void
     */
    public function fetchData($data) : void;
}