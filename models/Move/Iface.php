<?php

namespace Move;

/**
 * \Move\Iface
 *
 * @author Gavin Corbett <gavin.corbett@dowjones.com>
 * @package FNO
 * @version $Id$
 * @copyright dowjones.com
 */
interface Iface
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
     * @param \Move\Iface $opponentsMove
     * @return boolean
     */
    public function beatenBy(Iface $opponentsMove);
}
