<?php

namespace App\Http\Requests\Customers;

use App\Models\Customer;
use App\Rules\CpfOrCnpjFormat;
use App\Enums\CustomerType;
use App\Http\Requests\FormRequest;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Validation\Rule;

/**
 * @property Customer $customer
 */
class UpdateCustomerFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        $uniqueCpfCnpj = Rule::unique("customers", "cpf_cnpj")
            ->whereNotIn("cpf_cnpj", [$this->customer->cpf_cnpj]);

        $uniqueEmail = Rule::unique("customers", "email")
            ->whereNotIn("email", [$this->customer->email]);

        return [
            "cpf_cnpj"  => ["required", new CpfOrCnpjFormat, "max:15", $uniqueCpfCnpj],
            "email"     => ["required", "string", "email", "max:50", $uniqueEmail],
            "full_name" => ["required", "string", "max:50"],
            "type"      => ["required", new EnumValue(CustomerType::class)]
        ];

    }

}
