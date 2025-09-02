<?php

function applyDiscount(float $total, string $coupon) : float
{
    if ($coupon === "DISCOUNT10")
    {
        return $total * 0.9;
    }

    return $total;
}