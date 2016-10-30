<?php

if (!function_exists('class_uses'))
{
    function class_uses($class, $autoload = TRUE)
    {
        if (is_object($class) || class_exists($class, $autoload) || interface_exists($class, FALSE))
        {
            return array();
        }

        return FALSE;
    }
}