<?php

namespace NxsSpryker\Service\Prometheus;

use Spryker\Service\Kernel\AbstractBundleDependencyProvider;
use Spryker\Service\Kernel\Container;

class PrometheusDependencyProvider extends AbstractBundleDependencyProvider
{
    public const COUNTER_PLUGINS = 'COUNTER_PLUGINS';
    public const GAUGE_PLUGINS = 'GAUGE_PLUGINS';
    public const HISTOGRAM_PLUGINS = 'HISTOGRAM_PLUGINS';

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return \Spryker\Service\Kernel\Container
     */
    public function provideServiceDependencies(Container $container): Container
    {
        $this
            ->addCounterPlugins($container)
            ->addGaugePlugins($container)
            ->addHistogramPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return $this
     */
    protected function addCounterPlugins(Container $container)
    {
        $container[static::COUNTER_PLUGINS] = function () {
            return $this->getCounterPlugins();
        };

        return $this;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[] array<string, CounterPluginInterface>
     */
    protected function getCounterPlugins(): array
    {
        return [];
    }

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return $this
     */
    protected function addGaugePlugins(Container $container)
    {
        $container[static::GAUGE_PLUGINS] = function () {
            return $this->getGaugePlugins();
        };

        return $this;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[] array<string, GaugePluginInterface>
     */
    protected function getGaugePlugins(): array
    {
        return [];
    }

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return $this
     */
    protected function addHistogramPlugins(Container $container)
    {
        $container[static::HISTOGRAM_PLUGINS] = function () {
            return $this->getHistogramPlugins();
        };

        return $this;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[] array<string, HistogramPluginInterface>
     */
    protected function getHistogramPlugins(): array
    {
        return [];
    }
}
