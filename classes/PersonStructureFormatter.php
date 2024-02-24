<?php

namespace Classes;

use Models\PersonModel;

class PersonStructureFormatter 
{
    /**
     * Person Model.
     * 
     * @var PersonModel $personModel
     */
    private PersonModel $personModel;
    
    /**
     * Constructor.
     * 
     * Initialise a Person model in the PersonStructureFormatter.
     */
    public function __construct()
    {
        $this->personModel = new PersonModel(); 
    }

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
        $this->personModel->setTitle(trim($person[0]));
        $this->personModel->setFirstName(count($person) == 2 ? null : ((strlen($person[1]) <= 2) ? null : trim($person[1])));
        $this->personModel->setInitial(strlen($person[1]) <= 2 ? trim($person[1]) : null);
        $this->personModel->setLastName(count($person) == 3 ? trim($person[2]) : trim($person[1]));
    }

    /**
     * Display the data of the person.
     * 
     * @return array returns an array of the person
     */
    public function display(): array
    {
        return [
            'title' => $this->personModel->getTitle(),
            'first_name' => $this->personModel->getFirstName(),
            'initial' => $this->personModel->getInitial(),
            'last_name' => $this->personModel->getLastName()
        ];
    }
}