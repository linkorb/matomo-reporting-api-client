<?php

require 'common.php';

$abTesting = $client->getModule('AbTesting');
$res = $abTesting->getAllExperiments(['idSite' => $siteId]);

print_r($res);


