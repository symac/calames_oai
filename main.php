<?php

use Phpoaipmh\Endpoint;

require __DIR__ . '/vendor/autoload.php';

$myEndpoint = Endpoint::build('http://www.calames.abes.fr/oai/oai2.aspx');

// Results will be iterator of SimpleXMLElement objects
$count = 1;
foreach ($myEndpoint->listRecords('oai_dc', null, null ,'330639805') as $record) {
    $identifier = $record->header->identifier;

    $data = $record->metadata->children( 'http://www.openarchives.org/OAI/2.0/oai_dc/' );
    $rows = $data->children( 'http://purl.org/dc/elements/1.1/' );

    print $identifier."\t".$rows->title."\n";
    $count++;
}