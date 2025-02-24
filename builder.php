<?php

# https://refactoring.guru/design-patterns/builder 

interface Builder
{
    public function reset();
    public function setSeats(int $num);
    public function setEngine(Engine $engine);
    public function setTripComputer();
    public function setGPS();
}
interface Engine {}

class CarBuilder implements Builder
{
    private Car $car;

    public function reset()
    {
        $this->car = new Car();
    }
    public function setSeats(int $number)
    {
        $this->car->setSeats($number);
    }
    public function setEngine(Engine $engine)
    {
        $this->car->setEngine($engine);
    }
    public function setTripComputer()
    {
        $this->car->setTripComputer();
    }
    public function setGPS()
    {
        $this->car->setGPS();
    }
    public function getResult()
    {
        return $this->car;
    }
}

class Car
{
    private int $seats;
    private ?Engine $engine = null;
    private bool $tripComputer = false;
    private bool $gps = false;

    public function setSeats(int $seats)
    {
        $this->seats = $seats;
    }
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }
    public function setTripComputer()
    {
        $this->tripComputer = true;
    }
    public function setGPS()
    {
        $this->gps = true;
    }
    public function showCar()
    {
        echo
        "🚘 CAR" . "\n" .
            "Seats: $this->seats, Engine: " . get_class($this->engine) .
            ", Trip Computer: " . ($this->tripComputer ? "Yes" : "No") .
            ", GPS: " . ($this->gps ? "Yes" : "No") . "\n";
    }
}

class CarManualBuilder implements Builder
{
    private Manual $manual;

    public function reset()
    {
        $this->manual = new Manual();
    }
    public function setSeats(int $number)
    {
        $this->manual->setSeats($number);
    }
    public function setEngine(Engine $engine)
    {
        $this->manual->setEngine($engine);
    }
    public function setTripComputer()
    {
        $this->manual->setTripComputer();
    }
    public function setGPS()
    {
        $this->manual->setGPS();
    }
    public function addTransmission()
    {
        $this->manual->addTransmission();
    }
    public function getResult()
    {
        return $this->manual;
    }
}

class Manual
{
    private int $seats;
    private ?Engine $engine = null;
    private bool $tripComputer = false;
    private bool $gps = false;

    public function setSeats(int $seats)
    {
        $this->seats = $seats;
    }
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }
    public function setTripComputer()
    {
        $this->tripComputer = true;
    }
    public function setGPS()
    {
        $this->gps = true;
    }
    public function addTransmission()
    {
        print('Add manual transmission');
    }
    public function showCar()
    {
        echo
        "🏎️  Manual Car" . "\n" .
            "Seats: $this->seats, Engine: " . get_class($this->engine) .
            ", Trip Computer: " . ($this->tripComputer ? "Yes" : "No") .
            ", GPS: " . ($this->gps ? "Yes" : "No") .
            ", Transmission: " . ("added") . "\n";
    }
}

class SportEngine implements Engine {}
class SuvEngine implements Engine {}

class Director
{
    public function makeSUV(Builder $builder)
    {
        $builder->reset();
        $builder->setSeats(6);
        $builder->setEngine(new SuvEngine);
        $builder->setTripComputer();
        $builder->setGPS();
    }

    public function makeSportsCar(Builder $builder)
    {
        $builder->reset();
        $builder->setSeats(2);
        $builder->setEngine(new SportEngine);
        $builder->setTripComputer();
        $builder->setGPS();
    }
}

$client = new Director();

// Build a SUV
$carBuilder = new CarBuilder();
$client->makeSUV($carBuilder);
$suv = $carBuilder->getResult();
$suv->showCar();

// Build a sports car
$carManualBuilder = new CarManualBuilder();
$client->makeSportsCar($carManualBuilder);
$sportsCar = $carManualBuilder->getResult();
$sportsCar->showCar();
