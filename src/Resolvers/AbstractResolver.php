<?php

declare(strict_types=1);

namespace ArtyomE\CreditCalculator\Resolvers;

use ArtyomE\CreditCalculator\DTO\PaymentScheduleDto;

abstract class AbstractResolver
{
    private int $precision = 0;

    abstract public function resolve(int $term, float $amount, float $yearlyPercentage): PaymentScheduleDto;

    public function getPrecision(): int
    {
        return $this->precision;
    }

    public function setPrecision(int $precision): void
    {
        $this->precision = $precision;
    }

    protected function prepareFloat(float $val): float
    {
        return round($val, $this->getPrecision());
    }

    protected function getMonthlyRate(float $yearlyPercentage): float
    {
        return $yearlyPercentage / 12 / 100;
    }
}
