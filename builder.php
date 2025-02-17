<?php

interface Pasta
{
    public function boilPasta();
    public function strainPasta();
    public function heatPanWithIngredients();
    public function addIngredients();
    public function addPasta();
    public function addToppings();
}

class WhitePasta implements Pasta
{
    public $cheese;

    public function __construct($cheese)
    {
        $this->cheese = $cheese;
    }

    public function boilPasta()
    {
        print('add water to a pot' . PHP_EOL);
        print('add salt to the water' . PHP_EOL);
        print('bring water to boiling temperature' . PHP_EOL);
        print('add pasta in the pot' . PHP_EOL);
    }

    public function strainPasta()
    {
        print('drain the pasta water with a strainer' . PHP_EOL);
        print('keep some of the pasta water' . PHP_EOL);
    }

    public function heatPanWithIngredients()
    {
        print('heat a pan over medium heat' . PHP_EOL);
        print('add olive oil' . PHP_EOL);
        print('add garlic' . PHP_EOL);
        print('stir until fragrant for 1-2 minutes' . PHP_EOL);
    }

    public function addIngredients()
    {
        print('pour chicken broth in the pan' . PHP_EOL);
        print('add salt and pepper' . PHP_EOL);
        print('add cream' . PHP_EOL);
    }

    public function addPasta()
    {
        print('add some pasta water' . PHP_EOL);
        print('add pasta into the pan' . PHP_EOL);
    }

    public function addToppings()
    {
        print('add parsley' . PHP_EOL);
        print("add {$this->cheese}" . PHP_EOL);
    }
}

class RedPasta implements Pasta
{
    public $cheese;

    public function __construct($cheese)
    {
        $this->cheese = $cheese;
    }

    public function boilPasta()
    {
        print('add water to a pot' . PHP_EOL);
        print('add salt to the water' . PHP_EOL);
        print('bring water to boiling temperature' . PHP_EOL);
        print('add pasta in the pot' . PHP_EOL);
    }

    public function strainPasta()
    {
        print('drain the pasta water with a strainer' . PHP_EOL);
        print('keep some of the pasta water' . PHP_EOL);
    }

    public function heatPanWithIngredients()
    {
        print('heat a pan over medium-high heat' . PHP_EOL);
        print('add ground beef and cook until browned' . PHP_EOL);
        print('add onions and stir' . PHP_EOL);
    }

    public function addIngredients()
    {
        print('add garlic' . PHP_EOL);
        print('add tomato paste' . PHP_EOL);
        print('add oregano' . PHP_EOL);
        print('add pepper flakes' . PHP_EOL);
        print('add pasta water' . PHP_EOL);
        print('add salt and black pepper' . PHP_EOL);
    }

    public function addPasta()
    {
        print('add pasta into the pan' . PHP_EOL);
    }

    public function addToppings()
    {
        print('add basil' . PHP_EOL);
        print("add {$this->cheese}" . PHP_EOL);
    }
}

class Chef
{
    public function cookCreamPasta(WhitePasta $pasta)
    {
        $pasta->boilPasta();
        $pasta->strainPasta();
        $pasta->heatPanWithIngredients();
        $pasta->addIngredients();
        $pasta->addPasta();
        $pasta->addToppings();
    }

    public function cookSpaghetti(RedPasta $pasta)
    {
        $pasta->boilPasta();
        $pasta->strainPasta();
        $pasta->heatPanWithIngredients();
        $pasta->addIngredients();
        $pasta->addPasta();
    }
}

class Application
{
    public function makePasta()
    {
        $chef = new Chef();

        $redPasta = new RedPasta('parmesan');
        $chef->cookSpaghetti($redPasta);

        $whitePasta = new WhitePasta('pecorino');
        $chef->cookCreamPasta($whitePasta);
    }
}

$cooking_class = new Application();
$cooking_class->makePasta();
