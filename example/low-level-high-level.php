<?php

require 'common.php';

// Low level API call
$res = $client->callApi('SitesManager.getAllSites');
print_r($res);

// High level module call
$sitesManager = $client->getModule('SitesManager');
$res = $sitesManager->getAllSites();

print_r($res);


