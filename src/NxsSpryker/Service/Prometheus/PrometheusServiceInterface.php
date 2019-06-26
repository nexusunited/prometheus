<?php

namespace NxsSpryker\Service\Prometheus;

use NxsSpryker\Service\Prometheus\Collector\CounterInterface;
use NxsSpryker\Service\Prometheus\Collector\GaugeInterface;
use NxsSpryker\Service\Prometheus\Collector\HistogramInterface;

interface PrometheusServiceInterface
{
    /**
     * Render metrics.
     *
     * @api
     *
     * @return string
     */
    public function renderMetrics(): string;

    /**
     * Register counter.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function registerCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface;

    /**
     * Get counter.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getCounter(string $namespace, string $name): CounterInterface;

    /**
     * Get or register counter.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\Counter
     */
    public function getOrRegisterCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface;

    /**
     * Register gauge.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function registerGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface;

    /**
     * Get gauge.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getGauge(string $namespace, string $name): GaugeInterface;

    /**
     * Get or register gauge.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getOrRegisterGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface;

    /**
     * Register histogram.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     * @param array|null $buckets
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function registerHistogram(
        string $namespace,
        string $name,
        string $help,
        array $labels = [],
        ?array $buckets = null
    ): HistogramInterface;

    /**
     * Get histogram.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getHistogram(string $namespace, string $name): HistogramInterface;

    /**
     * Get or create histogram.
     *
     * @api
     *
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     * @param array|null $buckets
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getOrCreateHistogram(
        string $namespace,
        string $name,
        string $help,
        array $labels = [],
        ?array $buckets = null
    ): HistogramInterface;
}
