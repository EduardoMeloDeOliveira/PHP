<?php

$relativePath = __DIR__ . "/filmes.json";

$fetchContentOnFile = file_get_contents($relativePath);

$jsonDecoded = json_decode($fetchContentOnFile,true);

print_r($jsonDecoded);