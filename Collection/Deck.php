<?php
namespace Cards\Collection;

use Cards\Collection;

class Deck extends Collection
{
    public function addPack()
    {
        $newPack = new Pack;
        $this->cards += $newPack->releaseCards();
    }
}