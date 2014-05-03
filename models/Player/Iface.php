<?php

namespace Player;

/**
 * \Player\Iface
 *
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @version $Id$
 */
interface Iface
{
    /**
     * Player's name
     *
     * @return string
     */
    public function getName();

    /**
     * Way of communicating the actors decision to the game
     *
     * @return \Move\MoveInterface
     */
    public function getMove();

    /**
     * hasBeenElimiated
     *
     * @return boolean
     */
    public function isEliminated();

    /**
     * beenElminiated
     *
     * @return this
     */
    public function beenEliminated();
}
