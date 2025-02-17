<?php

interface Character
{
    public function attack();
}

class Zelda implements Character
{
    public function attack()
    {
        return print('Light arrow' . PHP_EOL);
    }
}

class Link implements Character
{
    public function attack()
    {
        return print('Horizontal Slash' . PHP_EOL);
    }
}

$zelda = new Zelda();
$zelda->attack();

$link = new Link();
$link->attack();
