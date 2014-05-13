<?php

namespace Player;

/**
 * Factory
 *
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @version $Id$
 */
abstract class Factory
{
    /**
     * Holds all types of Player
     */
    protected static $_playerTypes = array(
        'Iorn',
        'Granite',
        'Wood',
        'EwarWooWoo',
    );

    /**
     * generatePlayer
     *
     * @param mixed $name
     * @return \Player\Iface
     */
    public static function generatePlayer($name)
    {
        $type = self::_getType(
            rand(0, count(self::$_playerTypes) - 1)
        );
        return new $type($name);
    }

    /**
     * _getType
     *
     * @param int $id
     * @return string
     */
    protected static function _getType($id)
    {
        return '\Player\\' . self::$_playerTypes[$id];
    }
}
