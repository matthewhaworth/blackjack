<?php
namespace Cards\Game\Blackjack\Strategy;

use Cards\Collection\Deck;
use Cards\Collection\Hand;
use Cards\Game\Strategy;

class User implements Strategy
{
    /**
     * @param Hand $hand
     * @param array (of card arrays) $context
     * @param Deck $deck
     * @return \Cards\Card
     */
    public function takeMove(Hand $hand, $context, Deck $deck = null)
    {
        $dealersHand = $context;

        /* @var Hand $dealersHand */
        $this->printHand($dealersHand, $hand);
        while ("H\n" == fread(STDIN, 2) || $this->countCards($hand) <= 21) {
            $card = $deck->drawCard();
            $hand->giveCard($card);
            $this->printHand($dealersHand, $hand);

            echo "Hit?\n";
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

    private function printHand($dealersHand, $hand)
    {
        echo "Dealer's Hand\n";
        foreach ($dealersHand->getVisibleCards() as $card) {
            echo $card . "\n";
        }
        $count = $this->countCards($dealersHand);
        echo "Total: {$count}\n";
        echo "\n\n";
        echo "Your Hand\n";
        foreach ($hand->getVisibleCards() as $card) {
            echo $card . "\n";
        }

        $count = $this->countCards($hand);
        echo "Total: {$count}\n";
    }
}