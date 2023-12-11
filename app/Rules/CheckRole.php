<?php

namespace App\Rules;

use App\Services\Role\RoleFactory;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Config;

class CheckRole implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       $access = !RoleFactory::setUp()->edit();

        if ($access) {
            $fail("The {$attribute} field is not allowed for your role.");
        }
    }
}
