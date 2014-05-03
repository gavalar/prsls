<?php

namespace Move;

/**
 * \Move\Move
 *
 * @uses \Move\Iface
 * @author Gavin Corbett <gavin.corbett@dowjones.com>
 * @package FNO
 * @version $Id$
 * @copyright dowjones.com
 */
abstract class Move implements Iface
{
    const MOVE_ROCK = 'Rock';
    const MOVE_SCISSORS = 'Scissors';
    const MOVE_PAPER = 'Paper';

    /**
     * Move Name
     *
     * @var string
     */
    protected $_name = null;

    /**
     * Name of Move that beats this move
     *
     * @var string
     */
    protected $_beat = null;

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
     * The Name of this class
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Checks if the Opponents Move beats this move
     *
     * @param \Move\Iface $opponentsMove
     * @return boolean
     */
    public function beatenBy(Iface $opponentsMove)
    {
        if ($opponentsMove->getName() === $this->_beat) {
            return true;
        }

        return false;
    }
}
