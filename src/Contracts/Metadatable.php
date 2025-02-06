<?php

namespace BitMx\SaloonMetadata\Contracts;

use Saloon\Repositories\Body\ArrayBodyRepository;

interface Metadatable
{
    public function metadata(): ArrayBodyRepository;
}
