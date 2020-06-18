<?php

namespace App\Models;

class Animal
{
    public $name;
    public $type;
    public $live;
    public $like;

    public function __construct(string $name)
    {
           $this->name = $name;
    }

    public function eat(string $victim)
    {
        return "{$this->name} is now eating {$victim}";
    }

    public function like (array $like)
    {
        $this->like = $like;
    }
}

