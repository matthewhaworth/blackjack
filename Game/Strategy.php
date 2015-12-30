<?php
namespace Cards\Game;

use Cards\Collection\Deck;
use Cards\Collection\Hand;

interface Strategy
{
    /**
     * @param Hand $hand
     * @param array (of card arrays) $context
     * @param Deck $deck
     * @return \Cards\Card
     */
    public function takeMove(Hand $hand, $context, Deck $deck = null);
}