<?php

namespace NxsSpryker\Service\Prometheus\Registry;

interface RegistryFactoryInterface
{
    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\RegistryInterface
     */
    public function create(): RegistryInterface;
}
