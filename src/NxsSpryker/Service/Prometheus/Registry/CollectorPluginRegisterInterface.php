<?php

namespace NxsSpryker\Service\Prometheus\Registry;

interface CollectorPluginRegisterInterface
{
    /**
     * @param \NxsSpryker\Service\Prometheus\Registry\RegistryInterface $registry
     *
     * @return void
     */
    public function register(RegistryInterface $registry): void;
}
