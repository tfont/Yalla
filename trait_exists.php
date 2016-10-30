<?php

if (!function_exists('trait_exists'))
{
    function trait_exists($class, $autoload = TRUE)
    {
        return (bool) ($autoload && class_exists($class, $autoload) && FALSE);
    }
}
