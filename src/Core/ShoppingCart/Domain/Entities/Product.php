<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use Exception;

class Product
{
    private string $name;
    private float $price;
    private string $slug;
    private string $image;
    private int $quantity;

    // public function __construct(
    //     string $name = "",
    //     float $price,
    //     string $slug,
    //     string $image,
    //     int $quantity
    // ) {
    //     $this->name = $name;
    //     $this->price = $price;
    //     $this->slug = $slug;
    //     $this->image = $image;
    //     $this->quantity = $quantity;
    // }

    public function setName(string $name)
    {
        if(empty($name)) {
            throw new \InvalidArgumentException("Nome não pode ser nulo");
        }

        if(strlen($name) < 2) {
            throw new \InvalidArgumentException("Nome do produto deve conter mais de dois caracteres");
        }
     
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSlug(): string
    {
        $name = $this->name;

        $validName = $this->slugify($name);

        return $validName;
    }

    private function slugify( $string, $separator = '-' )
    {
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        $special_cases = array( '&' => 'and', "'" => '');
        $string = mb_strtolower( trim( $string ), 'UTF-8' );
        $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
        $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
        $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
        $string = preg_replace("/[$separator]+/u", "$separator", $string);
        return $string;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
        ];
    }
}
