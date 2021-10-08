<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PercentDisesel implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($gas, $diesel)
    {
      $this->gas = $gas;
      $this->diesel = $diesel;
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
        $stations = $this->gas + $this->diesel;
        $porcentaje = ((float)$this->diesel * 100) / $stations;
        $porcentaje = round($porcentaje, 0);
        if ($porcentaje >= 20 && $porcentaje <= 30)
        {
          return True;
        }else{
          return False;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El procentaje de bombas de Diesel debe ser del 20%';
    }
}
