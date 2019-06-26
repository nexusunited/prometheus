<?php

namespace NxsSpryker\Service\Prometheus\Plugin;

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
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[]
     */
    public function getCounterPlugins(): array
    {
        return $this->counters;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[]
     */
    public function getGaugePlugins(): array
    {
        return $this->gauges;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[]
     */
    public function getHistogramPlugins(): array
    {
        return $this->histograms;
    }
}
