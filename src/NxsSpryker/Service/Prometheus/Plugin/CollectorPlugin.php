<?php

namespace NxsSpryker\Service\Prometheus\Plugin;

interface CollectorPlugin
{
    /**
     * @return string
     */
    public function getNamespace(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getHelp(): string;

    /**
     * @return array
     */
    public function getLabels(): array;
}
