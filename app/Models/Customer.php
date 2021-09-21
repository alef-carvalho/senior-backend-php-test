<?php

namespace App\Models;

use App\Enums\CustomerType;

/**
 * The customer model
 * @property int $id
 * @property string $cpf_cnpj
 * @property string $email
 * @property string $full_name
 * @property float $balance
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
        "balance",
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
        "balance" => "decimal:2",
        "type"    => CustomerType::class
    ];

    //checkers

    /**
     * Returns true when the customer type equals "PF"
     * @return bool
     */
    public function isPF(): bool
    {
        return $this->type->is(CustomerType::PF);
    }

    /**
     * Returns true when the customer type equals "PJ"
     * @return bool
     */
    public function isPJ(): bool
    {
        return $this->type->is(CustomerType::PJ);
    }

    //setters

    /**
     * Set the customer balance.
     * @param float $balance
     */
    public function setBalance(float $balance)
    {
        $this->balance = $balance;
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

    //mutators

    /**
     * Keep only numbers when saving the customer document.
     * @param $value
     */
    public function setCpfCnpjAttribute($value): void
    {
        $this->attributes['cpf_cnpj'] = preg_replace("/[^0-9]/", "", $value);
    }

}
