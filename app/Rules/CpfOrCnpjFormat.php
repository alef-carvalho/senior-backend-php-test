<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfOrCnpjFormat implements Rule
{
    /**
     * Valida o formato do cpf
     *
     * @param string $attribute
     * @param string $value
     * @return boolean
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^([0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}|[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2})$/', $value) > 0;
    }

    /**
     * The failed validation message.
     * @return string
     */
    public function message()
    {
        return 'O campo :attribute não possui o formato válido de CPF ou CNPJ.';
    }

}
