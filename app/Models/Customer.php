<?php

namespace App\Models;

use App\Enums\CustomerType;

/**
 * The customer model
 * @property int $id
 * @property string $cpf_cnpj
 * @property string $email
 * @property string $full_name
 * @property CustomerType $type
 */
class Customer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "full_name",
        "email",
        "cpf_cnpj",
        "type"
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        "type" => CustomerType::class
    ];

    //checkers

    public function isPF(): bool
    {
        return $this->type->is(CustomerType::PF);
    }

    public function isPJ(): bool
    {
        return $this->type->is(CustomerType::PJ);
    }

    //acessors

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'cpf_cnpj';
    }

}
