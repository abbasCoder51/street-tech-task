<?php

namespace Classes;

use Classes\StringSeperator\AndPersonStringSeparator;

class PersonArrayBuilder
{
    public function process(string $person): array
    {
        $personArray = explode(" ", str_replace(",", "", $person));

        // Check if 'and' or '&' exists within the array.
        $andFoundInArray = array_search('and', $personArray) || array_search('&', $personArray);
        if($andFoundInArray) {

            $andIndexLocation = array_search('and', $personArray) ? array_search('and', $personArray) : array_search('&', $personArray);

            // Create a two dimensional array, to split names into two seperate arrays
            // because of the appearance of the 'and' or '&'.
            $leftPart = array_splice($personArray, 0, $andIndexLocation);
            $rightPart = array_splice($personArray, 1);

            $personMatrix = [];
            foreach($rightPart as $index => $value) {
                if((count($leftPart) > 2)) {
                    continue;
                }
                
                if($index == 0) {
                    continue;
                }

                array_push($leftPart, $value);
            }

            $personMatrix[] = $leftPart;
            $personMatrix[] = $rightPart;

            return $personMatrix;
        }

        return $personArray;
    }
}