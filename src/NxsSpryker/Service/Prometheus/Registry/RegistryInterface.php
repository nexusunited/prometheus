<?php

namespace NxsSpryker\Service\Prometheus\Registry;

use Generated\Shared\Transfer\RenderedMetricsTransfer;
use NxsSpryker\Service\Prometheus\Collector\CounterInterface;
use NxsSpryker\Service\Prometheus\Collector\GaugeInterface;
use NxsSpryker\Service\Prometheus\Collector\HistogramInterface;

interface RegistryInterface
{
    /**
     * @return \Generated\Shared\Transfer\RenderedMetricsTransfer
     */
    public function renderMetrics(): RenderedMetricsTransfer;

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
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getCounterFromPlugin(string $key): CounterInterface;

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
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getGaugeFromPlugin(string $key): GaugeInterface;

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
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getHistogramFromPlugin(string $key): HistogramInterface;

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
