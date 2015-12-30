<?php
namespace Cards\Type;

class King extends Face
{
    protected function getName()
    {
        return "King";
    }

    protected function getStandardValue()
    {
        return 13;
    }
}