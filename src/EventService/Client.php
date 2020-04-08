<?php

namespace Wuwx\Hikvision\EventService;

use Wuwx\Hikvision\Kernel\BaseClient;

class Client extends BaseClient
{
    public function eventSubscriptionByEventTypes($params)
    {
        return $this->client->post("/artemis/api/eventService/v1/eventSubscriptionByEventTypes", $params);
    }

    public function eventSubscriptionView()
    {
        return $this->client->post("/artemis/api/eventService/v1/eventSubscriptionView");
    }

    public function eventUnSubscriptionByEventTypes($params)
    {
        return $this->client->post("/artemis/api/eventService/v1/eventUnSubscriptionByEventTypes", $params);
    }
}
