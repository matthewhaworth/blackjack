<?php
include('Game/Strategy.php');
include ('Card.php');
include ('Collection.php');

include('Type/Ace.php');
include('Type/Face.php');
include('Type/Jack.php');
include('Type/Joker.php');
include('Type/King.php');
include('Type/Number.php');
include('Type/Queen.php');


include('Collection/Pack.php');
include('Collection/Hand.php');
include('Collection/Deck.php');

include('Exception/NotVisibleException.php');

include('Game/Blackjack/Strategy/Dealer.php');
include('Game/Blackjack/Strategy/User.php');
include('Game/Blackjack/Game.php');

include('Game/Player.php');
include('Game/Round.php');




$blackjack = new \Cards\Game\Blackjack\Game();

/**
$pack = new \Cards\Collection\Pack;
$pack->shuffle();
while ($card = $pack->drawCard()) {
    echo $card . "\n";
    $c = fread(STDIN, 1);
}
*/