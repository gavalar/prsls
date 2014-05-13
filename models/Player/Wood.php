<?php

namespace Player;
use Move;

/**
 * \Player\Wood
 *
 * @uses PlayerAbstract
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @package FNO
 * @version $Id$
 */
class Wood extends PlayerAbstract
{
    protected $_type = 'Paper';

    /**
     * To be implemented in all sub classes
     *
     * @var array
     */
    protected $_attributes = array(
        self::ATTRIB_ROCK => 1,
        self::ATTRIB_SCISSORS => 9,
        self::ATTRIB_PAPER => 90,
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
            if ($this->caculateChance($this->_getAttribute(self::ATTRIB_PAPER))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_PAPER);
            } elseif ($this->caculateChance($this->_getAttribute(self::ATTRIB_SCISSORS))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_SCISSORS);
            } elseif ($this->caculateChance($this->_getAttribute(self::ATTRIB_ROCK))) {
                $move = \Move\Factory::build(\Move\Move::MOVE_ROCK);
            }
        }
        return $move;
    }
}
