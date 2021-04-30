<?php

namespace sanitizer;

class inputSanitizer
{
    
    public static $replacement = "";
    
    public static function sanitize($input)
    {
        return strip_tags(trim($input));
    }
    public static function sanitizeTags($input)
    {
        return strip_tags($input);
    }
    public static function sanitizeSpaces($input)
    {
        return trim($input);
    }
    public static function sanitizeAllSpaces($input)
    {
         return inputSanitizer::sanitizeSpaces(preg_replace('/\s/', self::$replacement, $input));
    }
    public static function sanitizeNumbers($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace('/[0-9]/', self::$replacement, $input));
    }
    public static function sanitizeWord($coincidence, $input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace('/' . $coincidence . '/i', self::$replacement, $input));
    }
    public static function sanitizeLetters($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace('/[a-zA-Z]/', self::$replacement,$input));
    }
    public static function sanitizeCharacters($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace('/\D/', self::$replacement,$input));
    }
    public static function sanitizeDigits($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace('/\d/', self::$replacement,$input));
    }
    public static function sanitizeImpurities($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace('/\W/', self::$replacement,$input));
    }
    public static function sanitizeUpperCase($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace("/[A-Z]/", self::$replacement,$input));
    }
    public static function sanitizeLowerCase($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace("/[a-z]/", self::$replacement,$input));
    }
    public static function sanitizeXSS($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace("/^[on]+[a-z]+/m", self::$replacement,$input));
    }
    public static function sanitizeEmail($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace("/\b[A-Za-z0-9._%@+-]+@[a-zA-z0-9]+\.[a-zA-Z]{2,6}\b/", self::$replacement,$input));
    }
    public static function sanitizeURL($input)
    {
        return inputSanitizer::sanitizeSpaces(preg_replace("/^(http|https)+://+([\w\S\d])+\.([\w\d])+?([a-z])+/", self::$replacement,$input));
    }
}
