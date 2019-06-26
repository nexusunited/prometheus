<?php

namespace NxsSpryker\Service\Prometheus\Collector;

interface GaugeInterface
{
    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function set(float $value, array $labels = []): void;

    /**
     * @param array $labels
     *
     * @return void
     */
    public function inc(array $labels = []): void;

    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function incBy(float $value, array $labels = []): void;

    /**
     * @param array $labels
     *
     * @return void
     */
    public function dec(array $labels = []): void;

    /**
     * @param float $value
     * @param array $labels
     *
     * @return void
     */
    public function decBy(float $value, array $labels = []): void;
}
