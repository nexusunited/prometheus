<?php

namespace NxsSpryker\Service\Prometheus\Collector;

interface CounterInterface
{
    /**
     * @param array $labels
     *
     * @return void
     */
    public function inc(array $labels = []): void;

    /**
     * @param int $count
     * @param array $labels
     *
     * @return void
     */
    public function incBy(int $count, array $labels = []): void;
}
