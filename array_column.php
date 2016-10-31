<?php

if (!function_exists('array_column'))
{
    function array_column(array $input, $column_key, $column_key = NULL)
    {
        $output = array();
        
        foreach ($input as $row)
        {
            $key       = NULL;
            $value     = NULL;

            $key_set   = FALSE;
            $value_set = FALSE;
            
            if ($column_key !== NULL && array_key_exists($column_key, $row))
            {
                $key_set = TRUE;
                $key     = (string) $row[$column_key];
            }
            
            if ($column_key === NULL)
            {
                $value_set = TRUE;
                $value     = $row;
            }
            elseif (is_array($row) && array_key_exists($column_key, $row))
            {
                $value_set = TRUE;
                $value     = $row[$column_key];
            }
            
            if ($value_set)
            {
                if ($key_set)
                {
                    $output[$key] = $value;
                }
                else
                {
                    $output[] = $value;
                }
            }
        }
        
        return (array) $output;
    }
}
