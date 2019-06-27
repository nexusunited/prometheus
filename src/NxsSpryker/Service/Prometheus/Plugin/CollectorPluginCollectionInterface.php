<?php

namespace NxsSpryker\Service\Prometheus\Plugin;

interface CollectorPluginCollectionInterface
{
    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface
     */
    public function getCounterPlugin(string $key): CounterPluginInterface;

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[]
     */
    public function getCounterPlugins(): array;

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface
     */
    public function getGaugePlugin(string $key): GaugePluginInterface;

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[]
     */
    public function getGaugePlugins(): array;

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface
     */
    public function getHistogramPlugin(string $key): HistogramPluginInterface;

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[]
     */
    public function getHistogramPlugins(): array;
}
