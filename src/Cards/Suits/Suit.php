<?php

namespace Solitaire\Cards\Suits;

abstract class Suit
{
    const SUIT_CLUBS = '♣';
    const SUIT_DIAMONDS = '♦';
    const SUIT_HEARTS = '♥';
    const SUIT_SPADES = '♠';

    const COLOR_BLACK = 'black';
    const COLOR_RED = 'red';

    public function getColor()
    {
        return $this->color;
    }

    public function getName()
    {
        return $this->name;
    }

    public function equals(Suit $suit)
    {
        return $suit->getName == $this->getName();
    }

    public function __toString()
    {
        return $this->symbol;
    }
}
