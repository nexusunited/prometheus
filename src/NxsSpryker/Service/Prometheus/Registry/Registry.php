<?php

namespace NxsSpryker\Service\Prometheus\Registry;

use Generated\Shared\Transfer\RenderedMetricsTransfer;
use NxsSpryker\Service\Prometheus\Collector\Counter;
use NxsSpryker\Service\Prometheus\Collector\CounterInterface;
use NxsSpryker\Service\Prometheus\Collector\Gauge;
use NxsSpryker\Service\Prometheus\Collector\GaugeInterface;
use NxsSpryker\Service\Prometheus\Collector\Histogram;
use NxsSpryker\Service\Prometheus\Collector\HistogramInterface;
use NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface;
use Prometheus\CollectorRegistry;
use Prometheus\Counter as PrometheusCounter;
use Prometheus\Gauge as PrometheusGauge;
use Prometheus\Histogram as PrometheusHistogram;
use Prometheus\RenderTextFormat;

class Registry implements RegistryInterface
{
    /**
     * @var \Prometheus\CollectorRegistry
     */
    private $registry;

    /**
     * @var \Prometheus\RenderTextFormat
     */
    private $renderer;

    /**
     * @var \NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface
     */
    private $pluginCollection;

    /**
     * @param \NxsSpryker\Service\Prometheus\Plugin\CollectorPluginCollectionInterface $pluginCollection
     * @param \Prometheus\CollectorRegistry $registry
     * @param \Prometheus\RenderTextFormat $renderer
     */
    public function __construct(
        CollectorPluginCollectionInterface $pluginCollection,
        CollectorRegistry $registry,
        RenderTextFormat $renderer
    ) {
        $this->pluginCollection = $pluginCollection;
        $this->registry = $registry;
        $this->renderer = $renderer;
    }

    /**
     * @return \Generated\Shared\Transfer\RenderedMetricsTransfer
     */
    public function renderMetrics(): RenderedMetricsTransfer
    {
        return (new RenderedMetricsTransfer())
            ->setContent($this->renderMetricsContent())
            ->setMimeType(RenderTextFormat::MIME_TYPE);
    }

    /**
     * @return string
     */
    protected function renderMetricsContent(): string
    {
        return $this->renderer->render(
            $this->registry->getMetricFamilySamples()
        );
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function registerCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface
    {
        return $this->createCounter($this->registry->registerCounter($namespace, $name, $help, $labels));
    }

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getCounterFromPlugin(string $key): CounterInterface
    {
        $plugin = $this->pluginCollection->getCounterPlugin($key);

        return $this->getCounter(
            $plugin->getNamespace(),
            $plugin->getName()
        );
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getCounter(string $namespace, string $name): CounterInterface
    {
        return $this->createCounter($this->registry->getCounter($namespace, $name));
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    public function getOrRegisterCounter(string $namespace, string $name, string $help, array $labels = []): CounterInterface
    {
        return $this->createCounter($this->registry->getOrRegisterCounter($namespace, $name, $help, $labels));
    }

    /**
     * @param \Prometheus\Counter $counter
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\CounterInterface
     */
    private function createCounter(PrometheusCounter $counter): CounterInterface
    {
        return new Counter($counter);
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function registerGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface
    {
        return $this->createGauge($this->registry->registerGauge($namespace, $name, $help, $labels));
    }

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getGaugeFromPlugin(string $key): GaugeInterface
    {
        $plugin = $this->pluginCollection->getGaugePlugin($key);

        return $this->getGauge(
            $plugin->getNamespace(),
            $plugin->getName()
        );
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getGauge(string $namespace, string $name): GaugeInterface
    {
        return $this->createGauge($this->registry->getGauge($namespace, $name));
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    public function getOrRegisterGauge(string $namespace, string $name, string $help, array $labels = []): GaugeInterface
    {
        return $this->createGauge($this->registry->getOrRegisterGauge($namespace, $name, $help, $labels));
    }

    /**
     * @param \Prometheus\Gauge $gauge
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\GaugeInterface
     */
    private function createGauge(PrometheusGauge $gauge): GaugeInterface
    {
        return new Gauge($gauge);
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     * @param array|null $buckets
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function registerHistogram(
        string $namespace,
        string $name,
        string $help,
        array $labels = [],
        ?array $buckets = null
    ): HistogramInterface {
        return $this->createHistogram(
            $this->registry->registerHistogram($namespace, $name, $help, $labels, $buckets)
        );
    }

    /**
     * @param string $key
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getHistogramFromPlugin(string $key): HistogramInterface
    {
        $plugin = $this->pluginCollection->getHistogramPlugin($key);

        return $this->getHistogram(
            $plugin->getNamespace(),
            $plugin->getName()
        );
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getHistogram(string $namespace, string $name): HistogramInterface
    {
        return $this->createHistogram($this->registry->getHistogram($namespace, $name));
    }

    /**
     * @param string $namespace
     * @param string $name
     * @param string $help
     * @param array $labels
     * @param array|null $buckets
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    public function getOrCreateHistogram(
        string $namespace,
        string $name,
        string $help,
        array $labels = [],
        ?array $buckets = null
    ): HistogramInterface {
        return $this->createHistogram(
            $this->registry->getOrRegisterHistogram($namespace, $name, $help, $labels, $buckets)
        );
    }

    /**
     * @param \Prometheus\Histogram $histogram
     *
     * @return \NxsSpryker\Service\Prometheus\Collector\HistogramInterface
     */
    private function createHistogram(PrometheusHistogram $histogram): HistogramInterface
    {
        return new Histogram($histogram);
    }
}
