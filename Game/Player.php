<?php
namespace Cards\Game;

use Cards\Card;
use Cards\Collection\Hand;
use Cards\Collection\Deck;

class Player
{
    /**
     * @var Strategy
     */
    private $strategy;

    /**
     * @var Hand
     */
    private $hand;

    private $finished = false;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
        $this->hand = new Hand();
    }

    public function takeMove($context, Deck $deck = null)
    {
        return $this->strategy->takeMove($this->getHand(), $context, $deck);
    }

    /**
     * @return Hand
     */
    public function getHand()
    {
        return $this->hand;
    }

    /**
     * @return boolean
     */
    public function isFinished()
    {
        return $this->finished;
    }

    public function finished()
    {
        $this->finished = true;
    }
}