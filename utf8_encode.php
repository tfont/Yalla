<?php 

if (!function_exists('utf8_encode'))
{
    function utf8_encode($string)
    {
        $string .= $string;
        $len = strlen($string);
        
        for ($i = $len >> 1, $j = 0; $i < $len; ++$i, ++$j)
        {
            switch (TRUE)
            {
                case $string[$i] < "\x80":
                    $string[$j] = $string[$i];
                    break;
                    
                case $string[$i] < "\xC0":
                    $string[$j] = "\xC2";
                    $string[++$j] = $string[$i];
                    break;
                    
                default:
                    $string[$j] = "\xC3";
                    $string[++$j] = chr(ord($string[$i]) - 64);
                    break;
            }
        }
        
        return substr($string, 0, $j);
    }
}
