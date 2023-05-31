<?php

$n_a = 3.225;
$n_b = 2.113;
$a = 20;
$b = 15;
$x = 18;

function interpolasi($n_a, $n_b, $a, $b, $x)
{
    if (!is_numeric($n_a) | !is_numeric($n_b) | !is_numeric($a) | !is_numeric($b) | !is_numeric($x)) {
        return "Parameter harus angka";
    }

    $n_x = $n_a + (($n_b - $n_a) / ($b - $a)) * ($x - $a);
    return $n_x;
}

$n_x = interpolasi($n_a, $n_b, $a, $b, $x);
echo "Nilai n_18% dengan metode interpolasi: " . $n_x;
