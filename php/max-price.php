<?php

namespace AddTwoNumbers1;

include __DIR__ . "/util/debug.php";

// Дан массив положительных целых чисел (длины N), описывающий цену единицы товара на протяжении N дней.
// Мы каждый день производим по одной единице товара. У нас есть склад, где мы можем хранить свой товар.
// Вычислить максимальную сумму, которую можно выручить за произведенные товары

function maxAmount(array $prices): int
{
    $maxAmount = 0;
    $maxIndex  = 0;

    foreach ($prices as $i => $price) {
        $pieces = $i + 1;
        $amount = $pieces * $price;
        if ($amount > $maxAmount) {
            $maxAmount = $amount;
            $maxIndex  = $i;
        }
    }

    if ($maxIndex < count($prices) - 1) {
        $tail = array_slice($prices, $maxIndex + 1);
        $maxAmount += maxAmount($tail);
    }

    return $maxAmount;
}

$prices = [1];
$prices = [25, 4, 3, 2, 3, 1, 2];
$prices = [10, 9, 5, 7, 1, 3, 2];

dd(
    maxAmount($prices)
);
