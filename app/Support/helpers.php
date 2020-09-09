<?php

if (!function_exists('format_str')) {
    function format_str(string $value, string $type)
    {
        $txtFormatted = $value;

        switch ($type) {
            case 'number':
                $txtFormatted = number_format($value, 2);
            break;
            case 'date':
                $txtFormatted = date_create($value)->format('d/m/Y');
            break;
            case 'datetime':
                $txtFormatted = date_create($value)->format('d/m/Y h:i a');
            break;
        }

        return $txtFormatted;
    }
}
