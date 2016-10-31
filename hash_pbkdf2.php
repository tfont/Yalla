<?php

if (!function_exists('hash_pbkdf2'))
{
    function hash_pbkdf2($algo, $password, $salt, $iterations, $length = 0, $raw_output = FALSE)
    {
        $blocks = ceil($length / strlen(hash($algo, NULL, TRUE)));
        $digest = '';

        for ($i = 1; $i <= $blocks; ++$i)
        {
            $ib = $block = hash_hmac($algo, $salt.pack('N', $i), $password, TRUE);

            for ($j = 1; $j < $iterations; ++$j)
            {
                $ib ^= ($block = hash_hmac($algo, $block, $password, TRUE));
            }

            $digest .= $ib;
        }

        if (!$raw_output)
        {
            $digest = bin2hex($digest);
        }
        
        return (string) substr($digest, 0, $length);
    }
}
