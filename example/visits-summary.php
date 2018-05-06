<?php

require 'common.php';

$m = $client->getModule('VisitsSummary');
$res = $m->get(['idSite' => $siteId, 'period' => 'day', 'date'=>'today']);

print_r($res);


