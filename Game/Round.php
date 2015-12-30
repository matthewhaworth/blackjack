<?php
namespace Cards\Game;

use Cards\Game\Player;

class Round
{
    private $players;
    private $roundCount = 0;

    public function __construct(array $players)
    {
        $this->players = $players;
    }

    public function nextPlayer()
    {
        $nextPlayer = current($this->players);
        next($this->players);
        return $nextPlayer;
    }

    public function newRound()
    {
        if ($this->allFinished()) {
            return false;
        }

        $this->roundCount++;
        reset($this->players);
        return true;
    }

    public function allFinished()
    {
        $finished = true;
        foreach ($this->players as $player) {
            /* @var $player Player */
            if (!$player->isFinished()) {
                $finished = false;
            }
        }

        return $finished;
    }

    /**
     * @return array
     */
    public function getAllHands()
    {
        $allHands = array();
        foreach ($this->players as $player) {
            /* @var Player $player */
            $allHands[] = $player->getHand();
        }

        return $allHands;
    }
}