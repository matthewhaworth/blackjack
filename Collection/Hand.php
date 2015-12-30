<?php
namespace Cards\Collection;

use Cards\Card;
use Cards\Collection;

class Hand extends Collection
{
    public function giveCard(Card $card)
    {
        $this->cards[] = $card;
        return $this;
    }

    public function giveCards(array $cards)
    {
        foreach ($cards as $card) {
            $this->cards[] = $card;
        }
        return $this;
    }

    public function randomCard()
    {
        return array_rand($this->cards);
    }

    public function getVisibleCards()
    {
        $visibleHand = array();
        foreach ($this->cards as $card) {
            if ($card->isVisible()) {
                $visibleHand[] = $card;
            }
        }

        return $visibleHand;
    }

    public function showAllCards()
    {
        foreach ($this->cards as $card) {
            /* @var Card $card */
            $card->showCard();
        }
    }
}