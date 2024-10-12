<?php

namespace App\Message;

use App\Entity\Series;

class SeriesWasDeleted
{
public function __construct(public readonly Series $series)
{
}
}