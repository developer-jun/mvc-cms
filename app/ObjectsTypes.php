<?php

namespace App;

class ObjectsTypes
{
    private const TYPE_BOOLEAN  = 'boolean';
    private const TYPE_INTEGER  = 'integer';
    private const TYPE_FLOAT    = 'float';
    private const TYPE_STRING   = 'string';
    private const TYPE_ARRAY    = 'array';
    private const TYPE_OBJECT   = 'object';
    private const TYPE_NULL     = 'null';


    public static function getType($variable) {
        $type = gettype($variable);

        if(is_bool($variable)) {
            return self::TYPE_BOOLEAN;
        }
        if(is_int($variable)) {
            return self::TYPE_INTEGER;
        }
        if(is_float($variable)) {
            return self::TYPE_FLOAT;
        }
        if(is_string($variable)) {
            return self::TYPE_STRING;
        }
        if(is_array($variable)) {
            return self::TYPE_ARRAY;
        }
        if(is_object($variable)) {
            return self::TYPE_OBJECT;
        }
        if(is_null($variable)) {
            return self::TYPE_NULL;
        }
    }

}