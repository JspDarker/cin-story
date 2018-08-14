<?php
/**
 * Created by PhpStorm.
 * User: jsp-thanh
 * Date: 8/12/18
 * Time: 1:18 PM
 */

class Validate
{
    public static function isEmpty($field)
    {
        return empty($field);
    }

    public static function isCharacter($field)
    {
        $pattern = '/^([a-z ])+$/i';
        return preg_match($pattern, $field);
    }

    public static function replaceByRedundancySpace($field)
    {
        $pattern = '/\s+/';
        $replacement = ' ';
        return preg_replace($pattern,$replacement,$field);
    }

    public static function isEmail($field)
    {
        return filter_var($field, FILTER_VALIDATE_EMAIL);
    }
}
