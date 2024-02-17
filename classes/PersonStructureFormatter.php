<?php

namespace Classes;

class PersonStructureFormatter 
{
    private string $title;
    private string|null $firstName;
    private string|null $initial;
    private string $lastName;

    public function format(string $person): void
    {
        $person = str_replace(",", "", $person);
        $personArray = explode(" ", $person);

        // Check if 'and' or '&' exists in the array
        if(($resultFoundAnd1 = array_search('and', $personArray) || $resultFoundAnd2 = array_search('&', $personArray)) > 0) {
            // Will need to create a two dimensional array, because of the appearance of the 'and' or '&'

            $leftPart = array_splice($personArray, 0, $resultFoundAnd1);
            $rightPart = array_splice($personArray, $resultFoundAnd1);

            $newTempArray = [];
            foreach($rightPart as $index => $value) {
                if($index == 0) {
                    continue;
                }

                array_push($leftPart, $value);
            }

            $newTempArray[] = $leftPart;
            $newTempArray[] = $rightPart;
        }

        // Check if the second array item is an 'and', '&', 
        // 'single character', 'single character with . at the end'

        $this->title = $personArray[0];
        $this->firstName = $personArray[1];
        $this->initial = null;
        $this->lastName = $personArray[2];

        // value 1 = title

        // value 2 = first_name, set as null if doesn't exist

        // value 3 = initial , if has e.g. F. then it's considered an initial, set as null if it doesn't exist

        // value 4 = last_name

        // if there is '&' or 'and' this becomes two people so an additional record is created
    }

    public function display(): array
    {
        return [
            'title' => $this->title,
            'first_name' => $this->firstName,
            'initial' => $this->initial,
            'last_name' => $this->lastName
        ];
    }
}