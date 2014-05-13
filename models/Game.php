<?php

/**
 * Game
 *
 * @author Gavin Corbett <gavin.corbett@dowjones.com>
 * @version $Id$
 */
class Game
{
    /**
     * All players in a game
     *
     * @var array
     */
    protected $_players = array();

    /**
     * All defeated players
     *
     * @var array
     */
    protected $_defeatedPlayers = array();

    /**
     * How the game was played
     *
     * @var array
     */
    protected $_messages = array();

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->_init();
    }

    /**
     * _init
     *
     * @return this
     */
    protected function _init()
    {
        return $this;
    }

    /**
     * addPlayer
     *
     * @param \Player\Iface $player
     * @return this
     */
    public function addPlayer(\Player\Iface $player)
    {
        $this->_addMessage('Player ' . $player->getName() . ' added to the tournament');
        $this->_players[] = $player;
        return $this;
    }

    /**
     * startGame
     *
     * @return true
     */
    public function startGame()
    {
        if (count($this->_players) % 2 != 0) {
            $this->_addMessage('Not enough players to play the tournament');
            return true;
        }

        $this->_addMessage('Tournament started .......');
        while (count($this->_players) != count($this->_defeatedPlayers) + 1) {
            $player1 = null;
            $player2 = null;
            foreach ($this->_players as $player) {
                if (is_null($player1) && !$player->isEliminated()) {
                    $this->_addMessage('Player ' . $player->getName() . ' selected to play');
                    $player1 = $player;
                } elseif (is_null($player2) && !$player->isEliminated()) {
                    $this->_addMessage('Player ' . $player->getName() . ' selected to play');
                    $player2 = $player;
                }

                if (!is_null($player1) && !is_null($player2)) {
                    $player1move = $player1->getMove();
                    $player2move = $player2->getMove();
                    $this->_addMessage('Player ' . $player1->getName() . ' selected move ' . $player1move->getName());
                    $this->_addMessage('Player ' . $player2->getName() .' selected move ' . $player2move->getName());

                    if ($player1move->beatenBy($player2move)) {
                        $this->_addMessage($player2move->getName() . ' beats ' . $player1move->getName());
                        $this->_addMessage('*** Player ' . $player1->getName() . ' elminated');
                        $player1->beenEliminated();
                        $this->_defeatedPlayers[] = $player1;
                        $player1 = null;
                        $player2 = null;
                    } elseif ($player2move->beatenBy($player1move)) {
                        $this->_addMessage($player1move->getName() . ' beats ' . $player2move->getName());
                        $this->_addMessage('*** Player ' . $player2->getName() . ' elminated');
                        $player2->beenEliminated();
                        $this->_defeatedPlayers[] = $player2;
                        $player1 = null;
                        $player2 = null;
                    } else {
                        $this->_addMessage('Both Players selected the same move, game drawn');
                    }
                }
            }
        }

        foreach ($this->_players as $player) {
            if (!$player->isEliminated()) {
                $this->_addMessage('Player ' . $player->getName() . ' is the winner');
            }
        }
        return true;
    }

    /**
     * getMessages
     *
     * @return string
     */
    public function getMessages()
    {
        $string = '';
        foreach ($this->_messages as $message) {
            $string .= $message . PHP_EOL;
        }

        return $string;
    }

    /**
     * Add's a message to the messages
     *
     * @param string $message
     * @return this
     */
    protected function _AddMessage($message)
    {
        $this->_messages[] = $message;
        return $this;
    }
}
