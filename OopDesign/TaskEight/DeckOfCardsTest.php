<?php

namespace OopDesign\TaskTen\TaskEight;

use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class DeckOfCardsTest extends TestCase
{
    public function testShuffle()
    {
        $cards = [6, 9, "king", "ace"];
        $deckOfCards = new DeckOfCards($cards);
        $shuffledDeck = $deckOfCards->getShuffled();
        print_r($shuffledDeck);
        $this->assertEquals(4 * count($cards), count($shuffledDeck));
        foreach ($cards as $card) {
            $this->assertTrue(in_array($card, $shuffledDeck));
        }
    }
}
