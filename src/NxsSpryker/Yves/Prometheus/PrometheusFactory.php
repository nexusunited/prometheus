<?php

namespace NxsSpryker\Yves\Prometheus;

use NxsSpryker\Service\Prometheus\PrometheusServiceInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class PrometheusFactory extends AbstractFactory
{
    /**
     * @return \NxsSpryker\Service\Prometheus\PrometheusServiceInterface
     */
    public function getPrometheusService(): PrometheusServiceInterface
    {
        return $this->getProvidedDependency(PrometheusDependencyProvider::PROMETHEUS_SERVICE);
    }
}
