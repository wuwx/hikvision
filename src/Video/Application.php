<?php
namespace Wuwx\Hikvision\Video;

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

        $this['cameras'] = function ($app) {
            return new Cameras\Client($app);
        };
    }

    public function __get($name)
    {
        return $this[$name];
    }
}