<?php
require_once('models/includes.php');

$game = new \Game();
foreach (range(1,4) as $player) {
    $player = \Player\Factory::generatePlayer($player);
    $game->addPlayer($player);
}

$game->startGame();
echo $game->getMessages();

