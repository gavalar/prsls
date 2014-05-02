<?php

class Game
{
    protected $_players = array();

    public function __construct()
    {
        $this->_init();
    }

    protected function _init()
    {
    }

    public function addPlayer(\Player\PlayerInterface $player)
    {
        $this->_players[] = $player;
        return $this;
    }
}
