<?php

namespace App\Repositories;

use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class TransferRepository extends Repository
{

    private Transfer $entity;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entity = new Transfer();
    }

    public function all(): Collection
    {
        return $this->entity->all();
    }

    public function create(array $attributes): Model
    {
        return $this->entity::query()->create($attributes);
    }

    public function find(int $id): ?Model
    {
        return $this->entity::query()->findOrFail($id);
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->entity::query()->findOrFail($id)->update($attributes);
    }

    public function destroy(int $id): bool
    {
        return $this->entity::query()->findOrFail($id)->delete();
    }

}
