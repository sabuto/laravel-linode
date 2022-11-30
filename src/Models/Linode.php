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

    public function createLinode(Model $author, array $data): bool
    {
        $linode = new static();
        $linode->fill(array_merge($data, [
            'owner_id' => $author->id,
            'owner_type' => get_class($author),
        ]));

        return (bool) $author->owner()->save($linode);
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
