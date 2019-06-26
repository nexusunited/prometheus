<?php

namespace NxsSpryker\Service\Prometheus\Registry;

interface RegistryContainerInterface
{
    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\RegistryInterface
     */
    public function getRegistry(): RegistryInterface;
}
