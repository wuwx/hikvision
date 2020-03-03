<?php

namespace Wuwx\Hikvision\Video\Cameras;

use Wuwx\Hikvision\Kernel\BaseClient;

class Client extends BaseClient
{
    public function previewURLs($params)
    {
        return $this->client->post("/artemis/api/video/v1/cameras/previewURLs", $params);
    }
}