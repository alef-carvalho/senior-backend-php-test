<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DecimalValue implements Rule
{

    protected int $places;

    /**
     * Create a new rule instance.
     *
     * @param int $places
     */
    public function __construct(int $places = 2)
    {
        $this->places = $places;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return preg_match( '/^[0-9]*\.?[0-9]{0,2}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute must be a valid decimal.';
    }

}
