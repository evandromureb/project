<?php

declare(strict_types = 1);

if (!function_exists('getNameInitials')) {
    /**
     * Retorna as duas iniciais do nome em maiúsculo.
     */
    function getNameInitials(?string $name = null): string
    {
        $name = trim((string) $name);

        if ($name === '') {
            return '??';
        }

        $words = preg_split('/\s+/u', $name, -1, PREG_SPLIT_NO_EMPTY);

        if ($words === false) {
            return '??';
        }

        if (count($words) === 1) {
            return mb_strtoupper(mb_substr($words[0], 0, 2));
        }

        $first = mb_substr($words[0], 0, 1);
        $last  = mb_substr($words[array_key_last($words)], 0, 1);

        return mb_strtoupper($first . $last);
    }
}
