<?php

namespace NxsSpryker\Service\Prometheus\Plugin;

use NxsSpryker\Service\Prometheus\Exception\CollectorPluginNotFound;

class CollectorPluginCollection implements CollectorPluginCollectionInterface
{
    /**
     * @var \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[]
     */
    private $counters;

    /**
     * @var \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[]
     */
    private $gauges;

    /**
     * @var \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[]
     */
    private $histograms;

    /**
     * @param \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[] $counters
     * @param \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[] $gauges
     * @param \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[] $histograms
     */
    public function __construct(array $counters, array $gauges, array $histograms)
    {
        $this->counters = $counters;
        $this->gauges = $gauges;
        $this->histograms = $histograms;
    }

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface
     */
    public function getCounterPlugin(string $key): CounterPluginInterface
    {
        /** @var \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface $counter */
        $counter = $this->getPlugin($this->counters, $key);

        return $counter;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[]
     */
    public function getCounterPlugins(): array
    {
        return $this->counters;
    }

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface
     */
    public function getGaugePlugin(string $key): GaugePluginInterface
    {
        /** @var \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface $gauge */
        $gauge = $this->getPlugin($this->gauges, $key);

        return $gauge;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[]
     */
    public function getGaugePlugins(): array
    {
        return $this->gauges;
    }

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface
     */
    public function getHistogramPlugin(string $key): HistogramPluginInterface
    {
        /** @var \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface $histogram */
        $histogram = $this->getPlugin($this->histograms, $key);

        return $histogram;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[]
     */
    public function getHistogramPlugins(): array
    {
        return $this->histograms;
    }

    /**
     * @param array $collection
     * @param string $key
     *
     * @throws \NxsSpryker\Service\Prometheus\Exception\CollectorPluginNotFound
     *
     * @return \NxsSpryker\Service\Prometheus\Plugin\CollectorPlugin
     */
    protected function getPlugin(array $collection, string $key): CollectorPlugin
    {
        if (isset($collection[$key]) === false) {
            throw new CollectorPluginNotFound("Collector Plugin with key '{$key}' not found!'");
        }

        return $collection[$key];
    }
}
