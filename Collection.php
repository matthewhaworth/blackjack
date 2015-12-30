<?php
namespace Cards;

use Cards\Card;

abstract class Collection
{
    protected $cards = array();

    public function shuffle()
    {
        shuffle($this->cards);
    }

    /**
     * @return Card
     */
    public function drawCard()
    {
        if (count($this->cards) === 0) {
            return false;
        }

        $card = end($this->cards);
        array_pop($this->cards);
        return $card;
    }

    /**
     * View card without removing it from the pack
     *
     * @return bool|mixed
     */
    public function peekCard()
    {
        if (count($this->cards) === 0) {
            return false;
        }

        $card = end($this->cards);
        return $card;
    }

    public function releaseCards()
    {
        $cards = $this->cards;
        $this->cards = array();
        return $cards;
    }

    public function hasCards()
    {
        return count($this->cards) > 0;
    }
}