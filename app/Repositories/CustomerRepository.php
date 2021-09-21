<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository extends Repository
{

    private Customer $entity;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entity = new Customer();
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

    public function findByCpfOrCnpj(string $cpfCnpj)
    {
        return $this->entity::query()->where("cpf_cnpj", $cpfCnpj)->firstOrFail();
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
