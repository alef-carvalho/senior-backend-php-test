<?php

namespace App\Http\Requests\Customers;

use App\Rules\CpfOrCnpjFormat;
use App\Enums\CustomerType;
use App\Http\Requests\FormRequest;
use BenSampo\Enum\Rules\EnumValue;

class StoreCustomerFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "cpf_cnpj"  => ["required", new CpfOrCnpjFormat, "max:15", "unique:customers,cpf_cnpj"],
            "email"     => ["required", "string", "email", "max:50", "unique:customers,email"],
            "full_name" => ["required", "string", "max:50"],
            "type"      => ["required", new EnumValue(CustomerType::class)]
        ];
    }

}
