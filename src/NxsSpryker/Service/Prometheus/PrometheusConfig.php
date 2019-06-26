<?php

namespace NxsSpryker\Service\Prometheus;

use NxsSpryker\Shared\Prometheus\PrometheusConstants;
use Spryker\Service\Kernel\AbstractBundleConfig;

class PrometheusConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getAdapter(): string
    {
        return $this->get(PrometheusConstants::ADAPTER);
    }

    /**
     * @return array
     */
    public function getAdapterOptions(): array
    {
        return $this->get(PrometheusConstants::ADAPTER_OPTIONS, []);
    }
}
