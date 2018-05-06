<?php

use Symfony\Component\Dotenv\Dotenv;

use Matomo\ReportingApi\Client;

require_once __DIR__ . '/../vendor/autoload.php';

$filename = __DIR__.'/../.env';
if (!file_exists($filename)) {
    throw new RuntimeException(".env not found: " . $filename);
}
$dotenv = new Dotenv();
$dotenv->load($filename);

$url = getenv('MATOMO_URL');
$token = getenv('MATOMO_TOKEN');
$siteId = getenv('MATOMO_SITE_ID');

if (!$url) {
    throw new RuntimeException("MATOMO_URL not defined");
}
if (!$token) {
    throw new RuntimeException("MATOMO_TOKEN not defined");
}

if (!$siteId) {
    throw new RuntimeException("MATOMO_SITE_ID not defined");
}

$client = Client::create($url, $token);



