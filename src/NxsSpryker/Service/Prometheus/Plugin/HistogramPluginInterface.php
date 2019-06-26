<?php

namespace NxsSpryker\Service\Prometheus\Plugin;

interface HistogramPluginInterface extends CollectorPlugin
{
    /**
     * @return array|null
     */
    public function getBuckets(): ?array;
}
