<?php

function removeAccents($str)
{
    if (class_exists('Normalizer')) {
        $str = Normalizer::normalize($str, Normalizer::FORM_D);
    }

    return preg_replace('/[\x{0300}-\x{036f}]/u', '', $str);
}

function validateCPF($cpf): bool
{
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) != 11) {
        return false;
    }

    if (preg_match('/^(\d)\1+$/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}
