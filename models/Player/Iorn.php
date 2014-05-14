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
        \Move\Move::MOVE_ROCK => 20,
        \Move\Move::MOVE_SCISSORS => 60,
        \Move\Move::MOVE_PAPER => 20,
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

        if ($percentage < $this->_getAttribute(\Move\Move::MOVE_SCISSORS)) {
            $move = \Move\Factory::build(\Move\Move::MOVE_SCISSORS);
        } elseif ($percentage < ($this->_getAttribute(\Move\Move::MOVE_ROCK) + $this->_getAttribute(\Move\Move::MOVE_SCISSORS))) {
            $move = \Move\Factory::build(\Move\Move::MOVE_SCISSORS);
        } else {
            $move = \Move\Factory::build(\Move\Move::MOVE_PAPER);
        }
        return $move;
    }
}
