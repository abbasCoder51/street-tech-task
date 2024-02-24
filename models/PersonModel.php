<?php

namespace Models;

class PersonModel
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
    private ?string $lastName;

    /**
     * Set title.
     * 
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set first name.
     * 
     * @param string $firstName
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get first name.
     * 
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set initial.
     * 
     * @param string $initial
     */
    public function setInitial(?string $initial)
    {
        $this->initial = $initial;
    }

    /**
     * Get initial.
     * 
     * @return ?string
     */
    public function getInitial()
    {
        return $this->initial;
    }

    /**
     * Set last name.
     * 
     * @param string $lastName
     */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get last name.
     * 
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}