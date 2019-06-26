<?php

namespace NxsSpryker\Service\Prometheus\Registry;

use NxsSpryker\Service\Prometheus\Collector\CounterInterface;
use NxsSpryker\Service\Prometheus\Collector\GaugeInterface;
use NxsSpryker\Service\Prometheus\Collector\HistogramInterface;

interface RegistryInterface
{
    /**
     * @return string
     */
    public function renderMetrics(): string;

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function registerCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface;

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getCounter(string $namespace, string $name): CounterInterface;

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getOrRegisterCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface;

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function registerGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface;

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getGauge(string $namespace, string $name): GaugeInterface;

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getOrRegisterGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface;

    /**
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
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getHistogram(string $namespace, string $name): HistogramInterface;

    /**
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
