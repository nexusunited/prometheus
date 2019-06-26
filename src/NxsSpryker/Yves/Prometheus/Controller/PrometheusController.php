<?php

namespace NxsSpryker\Yves\Prometheus\Controller;

use Generated\Shared\Transfer\RenderedMetricsTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method \NxsSpryker\Yves\Prometheus\PrometheusFactory getFactory()
 */
class PrometheusController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function metricsAction(): Response
    {
        $metrics = $this->getMetrics();

        return new Response(
            $metrics->getContent(),
            200,
            [
                'Content-Type' => $metrics->getMimeType(),
            ]
        );
    }

    /**
     * @return \Generated\Shared\Transfer\RenderedMetricsTransfer
     */
    protected function getMetrics(): RenderedMetricsTransfer
    {
        return $this->getFactory()
            ->getPrometheusService()
            ->renderMetrics();
    }
}
