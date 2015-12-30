<?php
namespace Cards;

use Cards\NotVisibleException;

abstract class Card
{
    const SUIT_HEARTS = 'hearts';
    const SUIT_DIAMONDS = 'diamonds';
    const SUIT_CLUBS = 'clubs';
    const SUIT_SPADES = 'spades';

    private $value;
    private $suit;
    private $isVisible;

    public function __construct($suit, $value = null, $isVisible = true)
    {
        if (!in_array($suit, self::getSuits())) {
            throw new \InvalidArgumentException('Invalid suit.');
        }

        $this->suit = $suit;

        if ($value == null) {
            $value = $this->getStandardValue();
        }

        if (!$this->isValidValue($value)) {
            throw new \InvalidArgumentException('Invalid value.');
        }

        $this->value = $value;

        $this->isVisible = $isVisible;
    }

    public function getValue()
    {
        if (!$this->isVisible()) {
            throw new NotVisibleException();
        }

        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getSuit()
    {
        if (!$this->isVisible()) {
            throw new NotVisibleException();
        }

        return $this->suit;
    }

    /**
     * @return array
     */
    public static function getSuits()
    {
        return array(self::SUIT_HEARTS, self::SUIT_DIAMONDS, self::SUIT_CLUBS, self::SUIT_SPADES);
    }

    public function __toString()
    {
        return "{$this->getName()} of {$this->getSuit()}";
    }

    public function hideCard()
    {
        $this->isVisible = false;
        return $this;
    }

    public function showCard()
    {
        $this->isVisible = true;
        return $this;
    }

    public function isVisible()
    {
        return $this->isVisible;
    }

    abstract protected function isValidValue($value);

    abstract protected function getStandardValue();

    abstract protected function getName();
}