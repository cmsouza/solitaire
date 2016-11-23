<?php

namespace Solitaire\Cards;

use Solitaire\Cards\Suits\Clubs;
use Solitaire\Cards\Suits\Diamonds;
use Solitaire\Cards\Suits\Hearts;
use Solitaire\Cards\Suits\Spades;

class Deck
{
    const MAX_SIZE = 52;

    protected $cards = [];
    protected $position;

    public function __construct()
    {
        $suits = [
            new Clubs(),
            new Diamonds(),
            new Hearts(),
            new Spades(),
        ];

        foreach ($suits as $suit) {
            for ($i = 1; $i <= 13; ++$i) {
                $this->cards[] = new Card($i, $suit);
            }
        }

        $this->position = 0;
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function getCard()
    {
        if (!$this->valid()) {
            return null;
        }

        return array_pop($this->cards);
    }

    public function addCard(Card $card)
    {
        return array_push($this->cards, $card);
    }

    public function valid()
    {
        return !empty($this->cards);
    }

    public function __toString()
    {
        return sprintf('(%02d) %s', count($this->cards), implode(' ', $this->cards));
    }
}
