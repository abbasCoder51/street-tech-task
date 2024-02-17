<?php

namespace Classes;

class PersonStructureFormatter 
{
    /**
     * Title of person.
     * 
     * @var string
     */
    private string $title;

    /**
     * First name of person.
     * 
     * @var string|null
     */
    private ?string $firstName;

    /**
     * Initial of person.
     * 
     * @var string|null
     */
    private ?string $initial;

    /**
     * Last name of person.
     * 
     * @var string
     */
    private string $lastName;

    /**
     * Process the data for the person.
     * 
     * @param string $person The person data to process.
     * @return array Returns an array containing the processed data.
     */
    public function process(string $person): array
    {
        $person = str_replace(",", "", $person);
        $personArray = explode(" ", $person);

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

    /**
     * Initialise the data for the person.
     * 
     * The length of each person array item is checked to ensure that the title, firstName, 
     * initial and lastName properties are correctly set.
     * 
     * If the length is 2, set the title and lastName properties.
     * if the length is 3, set the title, firstName/ initial 
     * (Check length of string) and lastName properties.
     * 
     * @param array $person The person data to initialise.
     * @return void
     */
    public function initialise(array $person): void
    {
        $this->title = $person[0];
        $this->firstName = count($person) == 2 ? null : ((strlen($person[1]) <= 2) ? null : $person[1]);
        $this->initial = strlen($person[1]) <= 2 ? $person[1] : null;
        $this->lastName = count($person) == 3 ? $person[2] : $person[1];
    }

    /**
     * Display the data of the person.
     * 
     * @return array returns an array of the person
     */
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