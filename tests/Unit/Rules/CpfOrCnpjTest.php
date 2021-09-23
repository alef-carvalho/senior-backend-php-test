<?php

namespace Tests\Unit\Rules;

use App\Rules\CpfOrCnpjFormat;
use PHPUnit\Framework\TestCase;

class CpfOrCnpjTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_must_pass_with_valid_cpf_format()
    {

        //arrange
        $validator = new CpfOrCnpjFormat();

        //
        $validNumbers = $validator->passes('test', '85407807041');
        $validDotted = $validator->passes('test', '854.078.070-41');
        $invalidWithLetters = $validator->passes('test', 'a12312d12');

        //assert
        $this->assertTrue($validNumbers);
        $this->assertTrue($validDotted);
        $this->assertFalse($invalidWithLetters);

    }


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_must_pass_with_valid_cnpj_format()
    {

        //arrange
        $validator = new CpfOrCnpjFormat();

        //
        $validNumbers = $validator->passes('test', '30721323000135');
        $validDotted = $validator->passes('test', '30.721.323/0001-35');
        $invalidWithLetters = $validator->passes('test', 'a12312d12');

        //assert
        $this->assertTrue($validNumbers);
        $this->assertTrue($validDotted);
        $this->assertFalse($invalidWithLetters);

    }

}
