<?php

namespace NxsSpryker\Service\Prometheus\Registry;

class RegistryContainer implements RegistryContainerInterface
{
    /**
     * @var \NxsSpryker\Service\Prometheus\Registry\RegistryInterface|null
     */
    private static $instance;

    /**
     * @var \NxsSpryker\Service\Prometheus\Registry\RegistryFactoryInterface
     */
    private $factory;

    /**
     * @var \NxsSpryker\Service\Prometheus\Registry\CollectorPluginRegisterInterface
     */
    private $pluginRegister;

    /**
     * @param \NxsSpryker\Service\Prometheus\Registry\RegistryFactoryInterface $factory
     * @param \NxsSpryker\Service\Prometheus\Registry\CollectorPluginRegisterInterface $pluginRegister
     */
    public function __construct(RegistryFactoryInterface $factory, CollectorPluginRegisterInterface $pluginRegister)
    {
        $this->factory = $factory;
        $this->pluginRegister = $pluginRegister;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\RegistryInterface
     */
    public function getRegistry(): RegistryInterface
    {
        if (static::$instance === null) {
            static::$instance = $this->createRegistry();
        }

        return static::$instance;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\RegistryInterface
     */
    protected function createRegistry(): RegistryInterface
    {
        $registry = $this->factory->create();

        $this->pluginRegister->register($registry);

        return $registry;
    }
}
