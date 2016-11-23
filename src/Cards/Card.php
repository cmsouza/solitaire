<?php

namespace Solitaire\Cards;

use Solitaire\Cards\Suits\Suit;

class Card
{
    protected $value;
    protected $suit;

    public function __construct($value, Suit $suit)
    {
        $this->setValue($value);
        $this->setSuit($suit);
    }

    public function setSuit(Suit $suit)
    {
        $this->suit = $suit;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function setValue($value)
    {
        if ($value < 1 || $value > 13) {
            throw new Exception('Invalid value');
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value();
    }

    public function getColor()
    {
        return $this->suit->getColor();
    }

    public function equals(Card $card)
    {
        return $card->value == $this->value && $card->suit->equals($this->suit);
    }

    public function __toString()
    {
        $value = $this->value;
        $value = $value == 1 ? 'A' : $value;
        $value = $value == 11 ? 'J' : $value;
        $value = $value == 12 ? 'Q' : $value;
        $value = $value == 13 ? 'K' : $value;

        return $value.$this->suit;
    }
}
