<?php 

if (!function_exists('utf8_decode'))
{
    function utf8_decode($string)
    {
        $string .= '';
        $len = strlen($string);
        
        for ($i = 0, $j = 0; $i < $len; ++$i, ++$j)
        {
            switch ($string[$i] & "\xF0")
            {
                case "\xC0":
                case "\xD0":
                    $c = (ord($string[$i] & "\x1F") << 6) | ord($string[++$i] & "\x3F");
                    $string[$j] = $c < 256 ? chr($c) : '?';
                    break;
                case "\xF0":
                    ++$i;
                case "\xE0":
                    $string[$j] = '?';
                    $i += 2;
                    break;
                default:
                    $string[$j] = $string[$i];
            }
        }
        
        return substr($string, 0, $j);
    }
}
