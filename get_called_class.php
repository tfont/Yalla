<?php

if (!function_exists('get_called_class'))
{
    final class _class_tools
    {
        private static $i  = 0;
        private static $fl = NULL;

        public static function _get_called_class()
        {
            $bt = debug_backtrace();

            if (self::$fl == $bt[2]['file'].$bt[2]['line'])
            {
                self::$i++;
            }
            else
            {
                self::$i  = 0;
                self::$fl = $bt[2]['file'].$bt[2]['line'];
            }

            $lines = file($bt[2]['file']);

            preg_match_all('/([a-zA-Z0-9\_]+)::'.$bt[2]['function'].'/', $lines[$bt[2]['line']-1], $matches);

            return (string) $matches[1][self::$i];
        }
    }

    function get_called_class()
    {
        return (string) _class_tools::_get_called_class();
    }
}
