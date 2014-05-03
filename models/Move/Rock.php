<?php

namespace Move;

/**
 * \Move\Rock
 *
 * @uses \Move\Move
 * @author Gavin Corbett <gavin.corbett@dowjones.com>
 * @package FNO
 * @version $Id$
 * @copyright dowjones.com
 */
class Rock extends Move
{
    /**
     * Move Name
     *
     * @var string
     */
    protected $_name = self::MOVE_ROCK;

    /**
     * Name of Move that beats looses against
     *
     * @var string
     */
    protected $_beat = self::MOVE_PAPER;
}
