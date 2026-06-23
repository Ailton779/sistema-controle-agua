<?php

namespace App\Services;

class FaturaCalculatorService
{
    public function calcular(float $consumoM3, float $taxaFixa, float $limiteM3, float $valorExcedente): float
    {
        if ($consumoM3 <= $limiteM3) {
            return $taxaFixa;
        }
        $excedenteM3 = $consumoM3 - $limiteM3;
        return $taxaFixa + ($excedenteM3 * $valorExcedente);
    }
}
