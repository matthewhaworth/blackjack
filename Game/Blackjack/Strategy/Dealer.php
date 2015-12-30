<?php
namespace Cards\Game\Blackjack\Strategy;

use Cards\Collection\Deck;
use Cards\Collection\Hand;
use Cards\Game\Strategy;

class Dealer implements Strategy
{
    /**
     * @param Hand $hand
     * @param array $context
     * @param Deck $deck
     * @return \Cards\Card
     */
    public function takeMove(Hand $hand, $context, Deck $deck = null)
    {
        $hand->showAllCards();

        while ($this->countCards($hand) < 17) {
            $hand->giveCard($deck->drawCard());
        }
    }

    private function countCards(Hand $hand)
    {
        $handTotal = 0;
        foreach ($hand->getVisibleCards() as $card) {
            $handTotal += $card->getValue();
        }

        return $handTotal;
    }
}