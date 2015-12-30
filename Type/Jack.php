<?php
namespace Cards\Type;

class Jack extends Face
{
    protected function getName()
    {
        return "Jack";
    }

    protected function getStandardValue()
    {
        return 11;
    }
}