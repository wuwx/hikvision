<?php
namespace Wuwx\Hikvision\Kernel\Http;

use Zttp\Zttp;

class Client
{
    protected $app;
    protected $timestamp;
    protected $contentType = "application/json";
    protected $accept = "*/*";

    public function __construct($app)
    {
        $this->app = $app;
        $this->timestamp = time();
    }

    public function post($url, $params = [])
    {
        $response = Zttp::withoutVerifying()->withHeaders([
            "Accept" => $this->accept,
            "Content-Type" => $this->contentType,
            "X-Ca-Key" => $this->app['config']['app_key'],
            "X-Ca-Signature" => $this->getSignature($url),
            "X-Ca-Timestamp" => $this->timestamp,
            "X-Ca-Signature-Headers" => "x-ca-key,x-ca-timestamp",
        ])->post($this->app['config']['base_uri'] . $url, $params);
        return $response->json();
    }

    private function getSignature($url)
    {
        $data = implode("\n", ["POST", $this->accept, $this->contentType, "x-ca-key:" . $this->app['config']['app_key'], "x-ca-timestamp:" . $this->timestamp, $url]);
        return base64_encode(hash_hmac('sha256', $data, $this->app['config']['app_secret'], true));
    }
}
