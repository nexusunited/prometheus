<?php

namespace NxsSpryker\Service\Prometheus;

use NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollection;
use NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface;
use NxsSpryker\Service\Prometheus\Registry\CollectorPluginRegister;
use NxsSpryker\Service\Prometheus\Registry\CollectorPluginRegisterInterface;
use NxsSpryker\Service\Prometheus\Registry\RegistryContainer;
use NxsSpryker\Service\Prometheus\Registry\RegistryContainerInterface;
use NxsSpryker\Service\Prometheus\Registry\RegistryFactory;
use NxsSpryker\Service\Prometheus\Registry\RegistryFactoryInterface;
use Spryker\Service\Kernel\AbstractServiceFactory;

/**
 * @method \NxsSpryker\Service\Prometheus\PrometheusConfig getConfig()
 */
class PrometheusServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\RegistryContainerInterface
     */
    public function createRegistryContainer(): RegistryContainerInterface
    {
        return new RegistryContainer(
            $this->createRegistryFactory(),
            $this->createCollectorPluginRegister()
        );
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\RegistryFactoryInterface
     */
    public function createRegistryFactory(): RegistryFactoryInterface
    {
        return new RegistryFactory(
            $this->createCollectorPluginCollection(),
            $this->getConfig()->getAdapter(),
            $this->getConfig()->getAdapterOptions()
        );
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\CollectorPluginRegisterInterface
     */
    public function createCollectorPluginRegister(): CollectorPluginRegisterInterface
    {
        return new CollectorPluginRegister(
            $this->createCollectorPluginCollection()
        );
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface
     */
    public function createCollectorPluginCollection(): CollectorPluginCollectionInterface
    {
        return new CollectorPluginCollection(
            $this->getCounterPlugins(),
            $this->getGaugePlugins(),
            $this->getHistogramPlugins()
        );
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface[]
     */
    public function getCounterPlugins(): array
    {
        return $this->getProvidedDependency(PrometheusDependencyProvider::COUNTER_PLUGINS);
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\GaugePluginInterface[]
     */
    public function getGaugePlugins(): array
    {
        return $this->getProvidedDependency(PrometheusDependencyProvider::GAUGE_PLUGINS);
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Plugin\HistogramPluginInterface[]
     */
    public function getHistogramPlugins(): array
    {
        return $this->getProvidedDependency(PrometheusDependencyProvider::HISTOGRAM_PLUGINS);
    }
}
