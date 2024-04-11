<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use InvalidArgumentException;

class Cpf
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        $isValid = $this->validate($cpf);

        if (!$isValid) {
            throw new InvalidArgumentException('O CPF é inválido.');
        }

        $this->cpf = $cpf;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    private function validate(string $cpf)
    {
        if (empty($cpf)) {
            return false;
        }

        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        if (!empty($cpf) && strlen($cpf) < 11) {
            $cpf = strval(str_pad($cpf, 11, '0', STR_PAD_LEFT));
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
