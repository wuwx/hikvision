<?php
namespace Wuwx\Hikvision\Tests\Video;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Wuwx\Hikvision\Video\Application;

class ApplicationTest extends TestCase
{
    public function testCamerasPreviewURLs()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        $app = new Application([
            "base_uri" => getenv("HIKVISION_BASE_URI"),
            "app_key" => getenv("HIKVISION_APP_KEY"),
            "app_secret" => getenv("HIKVISION_APP_SECRET"),
        ]);
        $app->cameras->previewURLs([
            'cameraIndexCode' => getenv("HIKVISION_CAMERA_INDEX_CODE"),
            'protocol' => 'hls'
        ]);
    }
}