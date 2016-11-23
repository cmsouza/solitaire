<?php

namespace Solitaire\Game;

use Solitaire\Cards\Deck;

class Solitaire
{
    protected $deck;

    protected $deal = [];

    public function __construct(Deck $deck)
    {
        $this->deck = $deck;
    }

    public function deal()
    {
        $this->deal = [];
        $this->deck->shuffle();

        for ($column = 0; $column < 7; ++$column) {
            for ($card = 0; $card <= $column; ++$card) {
                $this->deal[$column][$card] = [
                    'card' => $this->deck->getCard(),
                    'visible' => $card == $column ? true : false,
                ];
            }
        }
    }
}

//gambiteste
require __DIR__.'/../../vendor/autoload.php';
$deck = new Deck();
$deck->shuffle();

$solitaire = new Solitaire($deck);

$solitaire->deal();
