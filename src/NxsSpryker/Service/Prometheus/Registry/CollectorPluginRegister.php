<?php

namespace NxsSpryker\Service\Prometheus\Registry;

use NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface;

class CollectorPluginRegister implements CollectorPluginRegisterInterface
{
    /**
     * @var \NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface
     */
    private $pluginCollection;

    /**
     * @param \NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface $pluginCollection
     */
    public function __construct(CollectorPluginCollectionInterface $pluginCollection)
    {
        $this->pluginCollection = $pluginCollection;
    }

    /**
     * @param \NxsSpryker\Service\Prometheus\Registry\RegistryInterface $registry
     *
     * @return void
     */
    public function register(RegistryInterface $registry): void
    {
        $this
            ->registerCounterPlugins($registry)
            ->registerGaugePlugins($registry)
            ->registerHistogramPlugins($registry);
    }

    /**
     * @param \NxsSpryker\Service\Prometheus\Registry\RegistryInterface $registry
     *
     * @return $this
     */
    protected function registerCounterPlugins(RegistryInterface $registry)
    {
        foreach ($this->pluginCollection->getCounterPlugins() as $counterPlugin) {
            $registry->registerCounter(
                $counterPlugin->getNamespace(),
                $counterPlugin->getName(),
                $counterPlugin->getHelp(),
                $counterPlugin->getLabels()
            );
        }

        return $this;
    }

    /**
     * @param \NxsSpryker\Service\Prometheus\Registry\RegistryInterface $registry
     *
     * @return $this
     */
    protected function registerGaugePlugins(RegistryInterface $registry)
    {
        foreach ($this->pluginCollection->getGaugePlugins() as $gaugePlugin) {
            $registry->registerGauge(
                $gaugePlugin->getNamespace(),
                $gaugePlugin->getName(),
                $gaugePlugin->getHelp(),
                $gaugePlugin->getLabels()
            );
        }

        return $this;
    }

    /**
     * @param \NxsSpryker\Service\Prometheus\Registry\RegistryInterface $registry
     *
     * @return $this
     */
    protected function registerHistogramPlugins(RegistryInterface $registry)
    {
        foreach ($this->pluginCollection->getHistogramPlugins() as $histogramPlugin) {
            $registry->registerHistogram(
                $histogramPlugin->getNamespace(),
                $histogramPlugin->getName(),
                $histogramPlugin->getHelp(),
                $histogramPlugin->getLabels(),
                $histogramPlugin->getBuckets()
            );
        }

        return $this;
    }
}
