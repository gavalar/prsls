<?php

namespace Move;

/**
 * \Move\Scissors
 *
 * @uses \Move\MoveAbstract
 * @author Gavin Corbett <gavin.corbett@dowjones.com>
 * @package FNO
 * @version $Id$
 * @copyright dowjones.com
 */
class Scissors extends MoveAbstract
{
    /**
     * Move Name
     *
     * @var string
     */
    protected $_name = self::MOVE_SCISSORS;

    /**
     * Name of Move that beats this move
     *
     * @var string
     */
    protected $_beat = self::MOVE_PAPER;
}
