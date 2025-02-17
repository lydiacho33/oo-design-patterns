<?php

// print(date(DATE_RFC2822));

class Singleton
{
    public static $foo = NULL;

    protected function __construct()
    {
        print('hello');
    }

    static function create()
    {

        if (!isset(self::$foo)) {
            $foo = new static();
        };

        return $foo;
    }
};

Singleton::create();
