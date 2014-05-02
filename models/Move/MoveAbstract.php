<?php

namespace Move;

/**
 * \Move\MoveAbstract
 *
 * @uses \Move\MoveInterface
 * @author Gavin Corbett <gavin.corbett@dowjones.com>
 * @package FNO
 * @version $Id$
 * @copyright dowjones.com
 */
abstract class MoveAbstract implements MoveInterface
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
     * @param \Move\MoveInterface $opponentsMove
     * @return boolean
     */
    public function beatenBy(MoveInterface $opponentsMove)
    {
        if ($opponentsMove->getName() === $this->_beaten) {
            return true;
        }

        return false;
    }
}
