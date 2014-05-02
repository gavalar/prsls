<?php

namespace Move;

/**
 * \Move\MoveInterface
 *
 * @author Gavin Corbett <gavin.corbett@dowjones.com>
 * @package FNO
 * @version $Id$
 * @copyright dowjones.com
 */
interface MoveInterface
{
    /**
     * The Name of this class
     *
     * @return string
     */
    public function getName();

    /**
     * Checks if the Opponents Move beats this move
     *
     * @param \Move\MoveInterface $opponentsMove
     * @return boolean
     */
    public function beatenBy(MoveInterface $opponentsMove);
}
