<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class CompleteNameAndLastname implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value)) {
            $fail('O campo :attribute deve ser um texto.');

            return;
        }

        $words = array_filter(explode(' ', trim((string) preg_replace('/\s+/', ' ', $value))));

        if (count($words) < 2) {
            $fail('O campo :attribute deve conter pelo menos o nome e sobrenome.');
        }
    }
}
