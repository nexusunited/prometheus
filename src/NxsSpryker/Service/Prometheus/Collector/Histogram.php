<?php

namespace NxsSpryker\Service\Prometheus\Collector;

use Prometheus\Histogram as PrometheusHistogram;

class Histogram implements HistogramInterface
{
    /**
     * @var \Prometheus\Histogram
     */
    private $histogram;

    /**
     * @param \Prometheus\Histogram $histogram
     */
    public function __construct(PrometheusHistogram $histogram)
    {
        $this->histogram = $histogram;
    }

    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function observe(float $value, array $labels = []): void
    {
        $this->histogram->observe($value, $labels);
    }
}
