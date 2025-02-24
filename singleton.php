<?php

// print(date(DATE_RFC2822));

class Singleton
{
    private static $instance = NULL;

    protected function __construct()
    {
        print('hello');
    }

    static function create()
    {

        if (!isset(self::$instance)) {
            self::$instance = new static();
        };

        return self::$instance;
    }
};

Singleton::create();

echo "Instance 1 Hash: " . spl_object_hash($instance1) . "\n";
