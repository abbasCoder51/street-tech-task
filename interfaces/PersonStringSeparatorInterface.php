<?php

namespace Interfaces;

interface PersonStringSeparatorInterface
{
    public function foundType(): bool;

    public function getTypeIndexLocation(): int;
}