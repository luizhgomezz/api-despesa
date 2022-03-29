<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DataFutura implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $dataDespesa = new \DateTime($value);
        $dataAtual = new \DateTime();
        return $dataAtual >= $dataDespesa;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A data da despesa deve ser inferior ou igual à data atual.';
    }
}
