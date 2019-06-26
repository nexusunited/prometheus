<?php

namespace NxsSpryker\Yves\Prometheus\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class PrometheusControllerProvider extends AbstractYvesControllerProvider
{
    public const ROUTE_METRICS = 'prometheus.metrics';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app): void
    {
        $this->addMetricRoute();
    }

    /**
     * @return $this
     */
    protected function addMetricRoute()
    {
        $this->createController(
            '/prometheus/metric',
            self::ROUTE_METRICS,
            'Prometheus',
            'Prometheus',
            'metrics'
        );

        return $this;
    }
}
