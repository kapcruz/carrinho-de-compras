<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\Cpf;

class CpfTest extends TestCase
{
    public function testCpfNotEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $cpf = New Cpf("");
    }

    /**
     * @dataProvider providerInvalidCpf
    */
    public function testCpfInvalid($cpf)
    {
        $this->expectException(InvalidArgumentException::class);
        New Cpf($cpf);
    }

    /**
     * @dataProvider providerValidCpf
    */
    public function testCpfIsValid($cpf)
    {
        $this->expectNotToPerformAssertions();
        New Cpf($cpf);
    }

    public static function providerValidCpf()
    {
        return [
            ['cpf' => "642.510.920-31"],
            ['cpf' => "087.411.080-78"],
            ['cpf' => "095.319.040-49"],
            ['cpf' => "064.250.080-08"],
            ['cpf' => "044.579.010-59"],
            ['cpf' => "87.411.080-78"],
            ['cpf' => "95.319.040-49"],
            ['cpf' => "64.250.080-08"],
            ['cpf' => "44.579.010-59"],
            ['cpf' => "64251092031"],
            ['cpf' => "08741108078"],
            ['cpf' => "09531904049"],
            ['cpf' => "06425008008"],
            ['cpf' => "04457901059"],
            ['cpf' => "8741108078"],
            ['cpf' => "9531904049"],
            ['cpf' => "6425008008"],
            ['cpf' => "4457901059"],
        ];
    }

    public static function providerInvalidCpf()
    {
        return [
            ['cpf' => "111.111.111-11"],
            ['cpf' => "222.222.222-22"],
            ['cpf' => "333.333.333-33"],
            ['cpf' => "444.444.444-44"],
            ['cpf' => "555.555.555-55"],
            ['cpf' => "666.666.666-66"],
            ['cpf' => "777.777.777-77"],
            ['cpf' => "888.888.888-88"],
            ['cpf' => "999.999.999-99"],
            ['cpf' => "000.000.000-00"],
            ['cpf' => "11111111111"],
            ['cpf' => "22222222222"],
            ['cpf' => "33333333333"],
            ['cpf' => "44444444444"],
            ['cpf' => "55555555555"],
            ['cpf' => "66666666666"],
            ['cpf' => "77777777777"],
            ['cpf' => "88888888888"],
            ['cpf' => "99999999999"],
            ['cpf' => "00000000000"],
        ];
    }
}
