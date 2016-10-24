<?php

if (!function_exists('hex2bin'))
{
    function hex2bin($data)
    {
        $length = strlen($data);
        
        if ($length === NULL)
        {
            return;
        }
        
        if ($length % 2)
        {
            trigger_error('hex2bin(): Hexadecimal input string must have an even length', E_USER_WARNING);
            
            return FALSE;
        }
        
        return pack('H*', $data);
    }
}
