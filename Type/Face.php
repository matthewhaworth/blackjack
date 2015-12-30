<?php
namespace Cards\type;

use Cards\Card;

abstract class Face extends Card
{
    /**
     * The value of any face card must be 10
     *
     * @param $value
     * @return bool
     */
    protected function isValidValue($value)
    {
        if ($value != $this->getStandardValue()) {
            return false;
        }

        return true;
    }
}