<?php

namespace App\Http\Requests\Transfers;

use App\Rules\DecimalValue;
use App\Rules\UnsignedValue;
use App\Http\Requests\FormRequest;

class StoreTransferFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "payer_id"    => ["required", "integer", "exists:customers,cpf_cnpj", "different:payee_id"],
            "payee_id"    => ["required", "integer", "exists:customers,cpf_cnpj", "different:payer_id"],
            "amount"      => ["required", new DecimalValue, new UnsignedValue],
            "description" => ["nullable", "string", "max:255"],
        ];
    }

}
