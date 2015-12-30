<?php
namespace Cards\Game\Blackjack;

use Cards\Collection\Deck;
use Cards\Collection\Hand;
use Cards\Game\Blackjack\Strategy\Dealer;
use Cards\Game\Blackjack\Strategy\User;
use Cards\Game\Player;
use Cards\Game\Round;

/**
 * - Everyone gets one card
 * - Dealer stops at a hard 17
 * - A hard 17 is a hand that contains no ace, or an ace forced to the value of 1
 */

class Game
{
    public function __construct()
    {
        $dealerStrategy = new Dealer();
        $dealerPlayer = new Player($dealerStrategy);

        $userStrategy = new User();
        $userPlayer = new Player($userStrategy);

        $round = new Round(array($userPlayer, $dealerPlayer));

        $deck = new Deck;
        $deck->addPack();
        $deck->shuffle();

        /**
         * Deal
         */
        $dealerPlayer->getHand()->giveCard($deck->drawCard());
        $dealerPlayer->getHand()->giveCard($deck->drawCard()->hideCard());

        $userPlayer->getHand()->giveCard($deck->drawCard());
        $userPlayer->getHand()->giveCard($deck->drawCard());

        /**
         * Player
         */
        while ($round->newRound()) {
            echo "Starting new round\n";
            while ($player = $round->nextPlayer()) {
                echo "Start of turn\n";
                /* @var Player $player */
                $player->takeMove($dealerPlayer->getHand(), $deck);
                $player->finished();
            }
        }

        $this->printHand($dealerPlayer->getHand(), $userPlayer->getHand());
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

    private function countCards(Hand $hand)
    {
        $handTotal = 0;
        foreach ($hand->getVisibleCards() as $card) {
            $handTotal += $card->getValue();
        }

        return $handTotal;
    }
}