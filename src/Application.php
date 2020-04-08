<?php
namespace Wuwx\Hikvision;

use Pimple\Container;
use Tightenco\Collect\Support\Collection;
use Wuwx\Hikvision\Kernel;

class Application extends Container
{
    public function __construct($config = [], array $values = array())
    {
        parent::__construct($values);

        $this['config'] = function () use ($config) {
            return new Collection($config);
        };

        $this['client'] = function ($app) {
            return new Kernel\Http\Client($app);
        };

        $this['eventService'] = function ($app) {
            return new EventService\Client($app);
        };
    }

    public function __get($name)
    {
        return $this[$name];
    }
}
