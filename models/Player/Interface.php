<?php

namespace Player;

/**
 * \Player\GameInterface
 *
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @version $Id$
 */
interface GameInterface
{
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
    public function hasBeenElimiated();

    /**
     * beenElminiated
     *
     * @return this
     */
    public function beenElminiated();
}
