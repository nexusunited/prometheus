<?php

namespace NxsSpryker\Shared\Prometheus;

interface PrometheusAdapters
{
    public const IN_MEMORY = 'in_memory';
    public const APC = 'apc';
    public const REDIS = 'redis';
}
