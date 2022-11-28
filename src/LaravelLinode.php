<?php

namespace Sabuto\LaravelLinode;

use Sabuto\LaravelLinode\Api\Images;
use Sabuto\LaravelLinode\Api\LinodeInstances;
use Sabuto\LaravelLinode\Api\LinodeTypes;
use Sabuto\LaravelLinode\Api\Regions;
use Sabuto\LaravelLinode\Models\Linode;

class LaravelLinode
{
    use LinodeTypes, LinodeInstances, Regions, Images;

    public function __construct(protected Linode $linode)
    {
    }

    public function delete(string $id): bool
    {
        return $this->linode->deleteLinode($id);
    }

    public function update(string $id, array $data): bool
    {
        return $this->linode->updateLinode($id, $data);
    }
}
