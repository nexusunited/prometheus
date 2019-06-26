<?php

namespace NxsSpryker\Service\Prometheus\Collector;

use Prometheus\Gauge as PrometheusGauge;

class Gauge implements GaugeInterface
{
    /**
     * @var \Prometheus\Gauge
     */
    private $gauge;

    /**
     * @param \Prometheus\Gauge $gauge
     */
    public function __construct(PrometheusGauge $gauge)
    {
        $this->gauge = $gauge;
    }

    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function set(float $value, array $labels = []): void
    {
        $this->gauge->set($value, $labels);
    }

    /**
     * @param array $labels
     *
     * @return void
     */
    public function inc(array $labels = []): void
    {
        $this->gauge->inc($labels);
    }

    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function incBy(float $value, array $labels = []): void
    {
        $this->gauge->incBy($value, $labels);
    }

    /**
     * @param array $labels
     *
     * @return void
     */
    public function dec(array $labels = []): void
    {
        $this->gauge->dec($labels);
    }

    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function decBy(float $value, array $labels = []): void
    {
        $this->gauge->decBy($value, $labels);
    }
}
