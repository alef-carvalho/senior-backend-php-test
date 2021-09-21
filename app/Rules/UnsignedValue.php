<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UnsignedValue implements Rule
{

    protected int $places;

    /**
     * Create a new rule instance.
     *
     * @param int $places
     */
    public function __construct(int $places = 8)
    {
        $this->places = $places;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @see https://php.net/manual/en/function.bccomp.php
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {

        try {
            return bccomp($value, '0.00', $this->places) === 1;
        } catch (\Throwable $e)
        {
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute must be a decimal value greather than zero.';
    }

}
