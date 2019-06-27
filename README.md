# Prometheus

[Prometheus SDK](https://github.com/Jimdo/prometheus_client_php) Spryker integration.

## Installation

Install:

```bash
$ composer require nxsspryker/prometheus
```

Note: you may need to add additional configuration to `composer.json`.
```json
{
  "repositories":[
    {
      "type": "vcs",
      "url": "git@bitbucket.org:nexusgruppe/prometheus.git"
    }
  ]
}
```

Configure:
```php
<?php

// config_default.php, for example

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
```


Register `PrometheusControllerProvider` to `YvesBootstrap` to expose the metrics.

## Usage

### Low Level API (based on the SDK)

Usage:

```php
<?php 

use \NxsSpryker\Service\Prometheus\PrometheusService;

$service = new PrometheusService(); 
$counter = $service->getOrRegisterCounter('foo', 'bar', 'baz');
$counter->inc();
```

### High Level API

Create a collector plugin:
```php
<?php

use \NxsSpryker\Service\Prometheus\Plugin\CounterPluginInterface;

class FooCounterPlugin implements CounterPluginInterface
{
    public function getNamespace() : string
    {
        return 'foo';
    }
    
    public function getName() : string
    {
        return 'bar';
    }
    
    public function getHelp() : string
    {
        return 'baz';
    }
    
    public function getLabels() : array
    {
        return [];    
    }
}
```

Register the plugin:

```php
<?php

use NxsSpryker\Service\Prometheus\PrometheusDependencyProvider as SprykerPrometheusDependencyProvider;

class PrometheusDependencyProvider extends SprykerPrometheusDependencyProvider
{
    protected function getCounterPlugins(): array
    {
        return [
            FooCounterPlugin::class => new FooCounterPlugin(),
        ];
    }
}
```

Usage:

```php
<?php 

use \NxsSpryker\Service\Prometheus\PrometheusService;

$service = new PrometheusService(); 
$counter = $service->getCounterFromPlugin(FooCounterPlugin::class);
$counter->inc();
```

