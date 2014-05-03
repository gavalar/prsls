<?php

namespace Move;

/**
 * \Move\Factory
 *
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @version $Id$
 */
class Factory
{
    /**
     * Returns a concrete class from a given type
     *
     * @param string $moveName
     * @return \Move\MoveInterface
     */
    static function build($moveName)
    {
        $move = sprintf('\Move\%s', $moveName);
        return new $move();
    }
}
