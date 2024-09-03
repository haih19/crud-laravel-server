<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinAge implements Rule
{
    /**
     * The minimum age allowed.
     *
     * @var int
     */
    protected $minAge;

    /**
     * Create a new rule instance.
     *
     * @param int $minAge
     * @return void
     */
    public function __construct($minAge)
    {
        $this->minAge = $minAge;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string|int  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value >= $this->minAge;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute must be at least ' . $this->minAge . ' years old.';
    }
}
