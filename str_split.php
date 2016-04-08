<?php 

if (!function_exists('str_split'))
{
    function str_split($string, $length = 1)
    {
        if ($length <= 0)
        {
            trigger_error(__FUNCTION__.'(): The the length of each segment must be greater then zero:', E_USER_WARNING);
            
            return FALSE;
        }

        $splitted   = array();
        $str_length = strlen($string);
        $i          = 0;

        if ($length == 1)
        {
            while ($str_length--)
            {
                $splitted[$i] = $string[$i++];
            }
        }
        else
        {
            $j = $i;
            
            while ($str_length > 0)
            {
                $splitted[$j++] = substr($string, $i, $length);
                $str_length    -= $length;
                $i             += $length;
            }
        }

        return (array) $splitted;
    }
}
