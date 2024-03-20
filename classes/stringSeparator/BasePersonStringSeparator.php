<?php

namespace Classes\StringSeparator;

use Interfaces\PersonStringSeparatorInterface;

abstract class BasePersonStringSeparator implements PersonStringSeparatorInterface
{
    protected string $type = '';

    protected array $personArray = [];

    public function __construct(array $personArray)
    {
        $this->personArray = $personArray;
    }

    public function foundType(): bool
    {
        return array_search($this->type, $this->personArray) > 0;
    }

    public function getTypeIndexLocation(): int
    {
        return array_search($this->type, $this->personArray);
    }
}