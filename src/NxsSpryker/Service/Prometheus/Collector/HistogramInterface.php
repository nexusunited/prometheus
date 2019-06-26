<?php

namespace NxsSpryker\Service\Prometheus\Collector;

interface HistogramInterface
{
    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function observe(float $value, array $labels = []): void;
}
