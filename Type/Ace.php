<?php
namespace Cards\Type;

use Cards\Card;

class Ace extends Card
{
    const STANDARD_VALUE = 1;

    /**
     * The value of an ace must be 1
     *
     * @param $value
     * @return bool
     */
    protected function isValidValue($value)
    {
        if ($value !== self::STANDARD_VALUE) {
            return false;
        }

        return true;
    }

    /**
     * @return int
     */
    protected function getStandardValue()
    {
        return self::STANDARD_VALUE;
    }

    protected function getName()
    {
        return "Ace";
    }
}