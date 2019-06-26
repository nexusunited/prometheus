<?php

namespace NxsSpryker\Yves\Prometheus;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class PrometheusDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROMETHEUS_SERVICE = 'PROMETHEUS_SERVICE';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $this->addPrometheusService($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return $this
     */
    protected function addPrometheusService(Container $container)
    {
        $container[static::PROMETHEUS_SERVICE] = function (Container $container) {
            $container->getLocator()->prometheus()->service();
        };

        return $this;
    }
}
