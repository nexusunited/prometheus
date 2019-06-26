<?php

namespace NxsSpryker\Service\Prometheus\Registry;

use NxsSpryker\Service\Prometheus\Exception\UnknownAdapterException;
use NxsSpryker\Shared\Prometheus\PrometheusAdapters;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\Adapter;
use Prometheus\Storage\APC;
use Prometheus\Storage\InMemory;
use Prometheus\Storage\Redis;

class RegistryFactory implements RegistryFactoryInterface
{
    /**
     * @var string
     */
    private $adapter;

    /**
     * @var array
     */
    private $adapterOptions;

    /**
     * @param string $adapter
     * @param array $adapterOptions
     */
    public function __construct(string $adapter, array $adapterOptions = [])
    {
        $this->adapter = $adapter;
        $this->adapterOptions = $adapterOptions;
    }

    /**
     * @return \NxsSpryker\Service\Prometheus\Registry\RegistryInterface
     */
    public function create(): RegistryInterface
    {
        return new Registry(
            $this->createCollectorRegistry(),
            $this->createTextRenderer()
        );
    }

    /**
     * @return \Prometheus\RenderTextFormat
     */
    protected function createTextRenderer(): RenderTextFormat
    {
        return new RenderTextFormat();
    }

    /**
     * @return \Prometheus\CollectorRegistry
     */
    protected function createCollectorRegistry(): CollectorRegistry
    {
        return new CollectorRegistry($this->createAdapter());
    }

    /**
     * @throws \NxsSpryker\Service\Prometheus\Exception\UnknownAdapterException
     *
     * @return \Prometheus\Storage\Adapter
     */
    protected function createAdapter(): Adapter
    {
        switch ($this->adapter) {
            case PrometheusAdapters::IN_MEMORY:
                return new InMemory();
            case PrometheusAdapters::APC:
                return new APC();
            case PrometheusAdapters::REDIS:
                return new Redis($this->adapterOptions);
            default:
                throw new UnknownAdapterException("Unknown adapter: '{$this->adapter}'!");
        }
    }
}
