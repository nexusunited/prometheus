<?php

namespace NxsSpryker\Service\Prometheus\Plugin;

interface CollectorPluginCollectionInterface
{
    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[]
     */
    public function getCounterPlugins(): array;

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[]
     */
    public function getGaugePlugins(): array;

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[]
     */
    public function getHistogramPlugins(): array;
}
