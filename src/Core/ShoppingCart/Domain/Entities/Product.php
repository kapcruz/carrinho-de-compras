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
    private string $code;

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
    
    public function setPrice(float $price): float
    {
        
        if($price < 0)
        {
            throw new \InvalidArgumentException("O preço não pode ser negativo");
        }
        
        if(!is_numeric($price))
        {
            throw new \InvalidArgumentException("O preço precisa estar em formato numérico");
        }

        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    
    public function setQuantity(int $quantity): int
    {
        
        if($quantity < 0)
        {
            throw new \InvalidArgumentException("A quantidade não pode ser negativa");
        }
        
        if(!is_numeric($quantity))
        {
            throw new \InvalidArgumentException("A quantidade precisa estar em formato numérico");
        }

        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getSlug(): string
    {
        $name = $this->name;

        $this->slug = $this->slugify($name);

        return $this->slug;
    }

    public function setImage(string $image)
    {
        $allowedExtensions = [
            'png',
            'jpg',
            'jpeg'
        ];

        $splited = explode('.', $image);
        $extension = end($splited);

        if (!in_array($extension, $allowedExtensions)) {
            throw new \InvalidArgumentException("A imagem deve estar no formato png, jpg ou jpeg.");
        }

        $this->image = $image;
    }

    public function getImage(): string
    {
        return $this->image;
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

    public function setCode(string $code)
    {
        if (empty($code)) {
            throw new \InvalidArgumentException("Código não pode ser nulo");
        }
        
        if (preg_match("/[^a-zA-Z0-9]/u", $code)) {
            throw new \InvalidArgumentException("Código não pode conter caracteres especiais");
        }

        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
