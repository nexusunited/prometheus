<?php

use NxsSpryker\Shared\Prometheus\PrometheusAdapters;
use NxsSpryker\Shared\Prometheus\PrometheusConstants;

$config[PrometheusConstants::ADAPTER] = PrometheusAdapters::REDIS;
$config[PrometheusConstants::ADAPTER_OPTIONS] = [
    'host' => '127.0.0.1',
    'port' => 6379,
    'password' => null,
    'timeout' => 0.1, // in seconds
    'read_timeout' => 10, // in seconds
    'persistent_connections' => false,
];
