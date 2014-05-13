<?php

namespace Player;
use Move;

/**
 * \Player\Iorn
 *
 * @uses PlayerAbstract
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @package FNO
 * @version $Id$
 */
class Iorn extends PlayerAbstract
{
    protected $_type = 'Iorn';

    /**
     * To be implemented in all sub classes
     *
     * @var array
     */
    protected $_attributes = array(
        self::ATTRIB_ROCK => 20,
        self::ATTRIB_SCISSORS => 60,
        self::ATTRIB_PAPER => 20,
    );

    /**
     * _makeMoveDecision
     *
     * @return \Move\MoveInterface
     */
    protected function _makeMoveDecision()
    {
        $move = null;
        while (is_null($move)) {
            if ($this->caculateChance($this->_getAttribute(self::ATTRIB_SCISSORS))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_SCISSORS);
            } elseif ($this->caculateChance($this->_getAttribute(self::ATTRIB_ROCK))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_ROCK);
            } elseif ($this->caculateChance($this->_getAttribute(self::ATTRIB_PAPER))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_PAPER);
            }
        }
        return $move;
    }
}
