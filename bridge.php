<?php

interface Animal
{
    public function getBreed();
}

class Fish implements Animal
{
    public $breed;

    public function __construct($breed)
    {
        $this->breed = $breed;
    }

    function getBreed()
    {
        print("Breed: {$this->breed}");
    }
}

class Characteristics
{
    protected Animal $animal;
    public $characteristics;

    public function __construct(Animal $animal, $characteristics)
    {
        $this->animal = $animal;
        $this->characteristics = $characteristics;
    }

    function setCharacteristics()
    {
        print("Crispr to add {$this->characteristics}");
    }
}

class Application
{
    public function breedGlowingDog()
    {
        $fish = new Fish('Zebrafish');
        $breedingCharacteristic = new Characteristics($fish, 'glow');
        $breedingCharacteristic->setCharacteristics();
    }
}

$breeding = new Application();
$breeding->breedGlowingDog();
