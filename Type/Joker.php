<?php
namespace Cards\Type;

use Cards\Card;

class Joker extends Card
{
    const STANDARD_VALUE = 0;

    /**
     * Let jokers have any value
     *
     * @param $value
     * @return bool
     */
    protected function isValidValue($value)
    {
        return true;
    }

    protected function getStandardValue()
    {
        return self::STANDARD_VALUE;
    }

    protected function getName()
    {
        return "Joker";
    }
}