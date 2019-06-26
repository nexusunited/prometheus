<?php

namespace NxsSpryker\Service\Prometheus\Collector;

use Prometheus\Counter as PrometheusCounter;

class Counter implements CounterInterface
{
    /**
     * @var \Prometheus\Counter
     */
    private $counter;

    /**
     * @param \Prometheus\Counter $counter
     */
    public function __construct(PrometheusCounter $counter)
    {
        $this->counter = $counter;
    }

    /**
     * @param array $labels
     *
     * @return void
     */
    public function inc(array $labels = []): void
    {
        $this->counter->inc($labels);
    }

    /**
     * @param int $count
     * @param array $labels
     *
     * @return void
     */
    public function incBy(int $count, array $labels = []): void
    {
        $this->counter->incBy($count, $labels);
    }
}
