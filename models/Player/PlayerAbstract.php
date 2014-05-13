<?php

namespace Player;
use Move;

/**
 * \Player\PlayerAbstarct
 *
 * @uses GameInterface
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @version $Id$
 */
class PlayerAbstract implements Iface
{
    const ATTRIB_ROCK = 'rock';
    const ATTRIB_SCISSORS = 'scissors';
    const ATTRIB_PAPER = 'paper';

    /**
     * To be implemented in all sub classes
     *
     * @var string
     */
    protected $_type = null;

    /**
     * Holds the players name
     *
     * @var string
     */
    protected $_playerName = null;

    /**
     * To be implemented in all sub classes
     *
     * @var array
     */
    protected $_attributes = array();

    /**
     * Keeps whether the actor has been eliminated or not
     *
     * @var boolean
     */
    protected $_eliminated = false;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct($playerName)
    {
        $this->_playerName = $playerName;
        $this->_init();
    }

    /**
     * Any startup routine needed per actor
     *
     * @return this
     */
    protected function _init()
    {
        return $this;
    }

    /**
     * Player's name
     *
     * @return string
     */
    public function getName()
    {
        return sprintf('%s (%s)', $this->_playerName, $this->_type);
    }

    /**
     * getMove
     *
     * @return \Move\MoveInterface
     */
    public function getMove()
    {
        return $this->_makeMoveDecision();
    }

    /**
     * Checks if the player is still in the game
     *
     * @return boolean
     */
    public function isEliminated()
    {
        return $this->_eliminated;
    }

    /**
     * Allows the player to be eliminated from the game
     *
     * @return this
     */
    public function beenEliminated()
    {
        $this->_eliminated = true;
        return $this;
    }

    /**
     * _makeMoveDecision
     *
     * @return \Move\MoveInterface
     */
    protected function _makeMoveDecision()
    {
        $move = null;
        while (is_null($move)) {
            if ($this->caculateChance($this->_getAttribute(self::ATTRIB_ROCK))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_ROCK);
            } elseif ($this->caculateChance($this->_getAttribute(self::ATTRIB_SCISSORS))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_SCISSORS);
            } elseif ($this->caculateChance($this->_getAttribute(self::ATTRIB_PAPER))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_PAPER);
            }
        }
        return $move;
    }

    /**
     * caculateChance
     *
     * This takes an integer and multiplies by 1000 then selects a random number between 0 and 100,000
     * if the random number is equal to lower than the percentage then returns true.
     * e.g. 30% = 30000
     *
     * @param int $percentage
     * @return bool
     */
    protected function caculateChance($percentage)
    {
        $percentage = $percentage * 1000;
        $chance = rand(0,100000);

        if ($percentage >= $chance)
        {
            return true;
        }

        return false;
    }

    /**
     * Will return a set attribute value as a percentage
     *
     * @param string $attributeName
     * @return int
     */
    protected function _getAttribute($attributeName)
    {
        if (isset($this->_attribute[$attributeName])) {
            return $this->_attribute[$attributeName];
        }

        return 10;
    }
}
