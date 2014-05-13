<?php

namespace Player;
use Move;

/**
 * \Player\Granite
 *
 * @uses PlayerAbstract
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @package FNO
 * @version $Id$
 */
class Granite extends PlayerAbstract
{
    protected $_type = 'Granite';

    /**
     * To be implemented in all sub classes
     *
     * @var array
     */
    protected $_attributes = array(
        self::ATTRIB_ROCK => 80,
        self::ATTRIB_SCISSORS => 17,
        self::ATTRIB_PAPER => 2,
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
}
