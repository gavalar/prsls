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
        \Move\Move::MOVE_ROCK => 80,
        \Move\Move::MOVE_SCISSORS => 17,
        \Move\Move::MOVE_PAPER => 2,
    );

    /**
     * _makeMoveDecision
     *
     * @return \Move\MoveInterface
     */
    protected function _makeMoveDecision()
    {
        $move = null;

        $percentage = mt_rand(0,100);

        if ($percentage < $this->_getAttribute(\Move\Move::MOVE_ROCK)) {
            $move = \Move\Factory::build(\Move\Move::MOVE_ROCK);
        } elseif ($percentage < ($this->_getAttribute(\Move\Move::MOVE_ROCK) + $this->_getAttribute(\Move\Move::MOVE_SCISSORS))) {
            $move = \Move\Factory::build(\Move\Move::MOVE_SCISSORS);
        } else {
            $move = \Move\Factory::build(\Move\Move::MOVE_PAPER);
        }
        return $move;
    }
}
