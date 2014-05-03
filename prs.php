<?php
require_once('models/includes.php');

$game = new \Game();
foreach (range(1,4) as $player) {
    $player = new \Player\Player($player);
    $game->addPlayer($player);
}

$game->startGame();
echo $game->getMessages();

