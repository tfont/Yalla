<?php

if (!function_exists('hash_equals'))
{
    function hash_equals($original_string, $user_input)
    {
        if (!is_string($original_string))
        {
            trigger_error('Expected original_string to be a string, '.gettype($original_string).' given', E_USER_WARNING);
            
            return FALSE;
        }
        if (!is_string($user_input))
        {
            trigger_error('Expected user_input to be a string, '.gettype($user_input).' given', E_USER_WARNING);
            
            return FALSE;
        }
        
        if (extension_loaded('mbstring'))
        {
        
            $original_length = mb_strlen($original_string, '8bit');
            $user_length     = mb_strlen($user_input, '8bit');
        }
        else
        {
            $original_length = strlen($original_string);
            $user_length     = strlen($user_input);
        }
        
        if ($original_length !== $user_length)
        {
            return FALSE;
        }
        
        $result = 0;
        
        for ($i = 0; $i < $original_length; ++$i)
        {
            $result |= ord($original_string[$i]) ^ ord($user_input[$i]);
        }
        
        return (bool) 0 === $result;
    }
}
