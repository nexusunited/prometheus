<?php

namespace NxsSpryker\Service\Prometheus;

use NxsSpryker\Service\Prometheus\Collector\CounterInterface;
use NxsSpryker\Service\Prometheus\Collector\GaugeInterface;
use NxsSpryker\Service\Prometheus\Collector\HistogramInterface;
use Spryker\Service\Kernel\AbstractService;

/**
 * @method \NxsSpryker\Service\Prometheus\PrometheusServiceFactory getFactory()
 */
class PrometheusService extends AbstractService implements PrometheusServiceInterface
{
    /**
     * @return string
     */
    public function renderMetrics(): string
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->renderMetrics();
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function registerCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->registerCounter($namespace, $name, $help, $labels);
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getCounter(string $namespace, string $name): CounterInterface
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->getCounter($namespace, $name);
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getOrRegisterCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->getOrRegisterCounter($namespace, $name, $help, $labels);
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function registerGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->registerGauge($namespace, $name, $help, $labels);
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getGauge(string $namespace, string $name): GaugeInterface
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->getGauge($namespace, $name);
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getOrRegisterGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->getOrRegisterGauge($namespace, $name, $help, $labels);
    }

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
    ): HistogramInterface {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->registerHistogram($namespace, $name, $help, $labels, $buckets);
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getHistogram(string $namespace, string $name): HistogramInterface
    {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->getHistogram($namespace, $name);
    }

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
    ): HistogramInterface {
        return $this->getFactory()
            ->createRegistryContainer()
            ->getRegistry()
            ->getOrCreateHistogram($namespace, $name, $help, $labels, $buckets);
    }
}
