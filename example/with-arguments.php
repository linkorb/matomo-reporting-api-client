<?php

require 'common.php';

$sitesManager = $client->getModule('SitesManager');
$res = $sitesManager->getSiteSettings(['idSite' => $siteId]);

print_r($res);


