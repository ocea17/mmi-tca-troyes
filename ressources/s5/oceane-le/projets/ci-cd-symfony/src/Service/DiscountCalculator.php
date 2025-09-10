<?php

namespace App\Service;

class DiscountCalculator
{
    public function calculateDiscount(float $totalAmount, bool $isVipCustomer): float
    {
        $discount = 0.0;

        // Remise de base de 10% si le montant est strictement supérieur à 100 €
        if ($totalAmount > 100) {
            $discount += $totalAmount * 0.10;
        }

        // Remise supplémentaire de 5% pour les clients VIP
        if ($isVipCustomer) {
            $discount += $totalAmount * 0.05;
        }

        // La remise totale ne peut pas dépasser 20% du montant total
        $maxDiscount = $totalAmount * 0.20;

        return min($discount, $maxDiscount);
    }
}
