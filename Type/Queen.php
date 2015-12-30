<?php
namespace Cards\Type;

class Queen extends Face
{
    protected function getName()
    {
        return "Queen";
    }

    protected function getStandardValue()
    {
        return 12;
    }
}