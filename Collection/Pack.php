<?php
namespace Cards\Collection;

use Cards\Card;

use Cards\Collection;
use Cards\Type\Ace;
use Cards\Type\King;
use Cards\Type\Queen;
use Cards\Type\Jack;
use Cards\Type\Number;


class Pack extends Collection
{
    public function __construct()
    {
        foreach (Card::getSuits() as $_suit) {
            $this->cards[] = new Ace($_suit);
        }

        for ($value = 2; $value <= 10; $value++) {
            foreach (Card::getSuits() as $_suit) {
                $this->cards[] = new Number($_suit, $value);
            }
        }

        foreach (Card::getSuits() as $_suit) {
            $this->cards[] = new Jack($_suit);
        }

        foreach (Card::getSuits() as $_suit) {
            $this->cards[] = new Queen($_suit);
        }

        foreach (Card::getSuits() as $_suit) {
            $this->cards[] = new King($_suit);
        }
    }
}
