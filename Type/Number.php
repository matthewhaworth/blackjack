<?php
namespace Cards\Type;

use Cards\Card;

class Number extends Card
{
    /**
     * The value of a number card must be between 2 and 10
     *
     * @param $value
     * @return bool
     */
    protected function isValidValue($value)
    {
        if ($value < 2 || $value > 10) {
            return false;
        }

        return true;
    }

    /**
     * A number card has no standard value
     *
     * @return bool
     */
    protected function getStandardValue()
    {
        return false;
    }

    public function __toString()
    {
        return "{$this->getValue()} of {$this->getSuit()}";
    }

    protected function getName()
    {
        return "Number";
    }
}