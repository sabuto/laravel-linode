<?php

namespace Sabuto\LaravelLinode\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Linode extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'linode_keys';

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }

    public function updateLinode(string|int $id, array $data): bool
    {
        return (bool) static::find($id)->update($data);
    }

    public function deleteLinode(string|int $id): bool
    {
        return (bool) static::find($id)->delete();
    }
}
