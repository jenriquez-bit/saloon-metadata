<?php

namespace BitMx\SaloonMetadata\Traits;

use BitMx\SaloonMetadata\Contracts\Metadatable;
use BitMx\SaloonMetadata\Exceptions\MetadataException;
use Saloon\Http\PendingRequest;
use Saloon\Repositories\Body\ArrayBodyRepository;

trait HasMetadata
{
    protected ArrayBodyRepository $metadata;

    public function bootHasMetadata(PendingRequest $pendingRequest): void
    {
        $request = $pendingRequest->getRequest();

        if ($request instanceof Metadatable || $pendingRequest->getConnector() instanceof Metadatable) {
            return;
        }

        throw new MetadataException(sprintf('You have added a metadata trait without implementing `%s` on your request or connector.', Metadatable::class));
    }

    public function metadata(): ArrayBodyRepository
    {
        return $this->metadata ?? new ArrayBodyRepository($this->defaultMetadata());
    }

    /**
     * @return array<array-key, mixed>
     */
    protected function defaultMetadata(): array
    {
        return [];
    }
}
