<?php

function removeAccents($str) {
    if (class_exists('Normalizer')) {
        $str = Normalizer::normalize($str, Normalizer::FORM_D);
    }

    return preg_replace('/[\x{0300}-\x{036f}]/u', '', $str);
}