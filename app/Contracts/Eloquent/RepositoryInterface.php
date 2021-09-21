<?php

namespace App\Contracts\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{

    /**
     * Retrieve all records on database
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Create a new record with array of fillable attributes.
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * Find a record by id
     *
     * @param int $id
     * @return Model
     */
    public function find(int $id): ?Model;

    /**
     * Update a record by id
     *
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool;

    /**
     * Find a record by id
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;

}