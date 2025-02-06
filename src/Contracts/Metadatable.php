<?php

namespace App\Libs\Saloon\Contracts;

use Saloon\Repositories\Body\ArrayBodyRepository;

interface Metadatable
{
    public function metadata(): ArrayBodyRepository;
}
