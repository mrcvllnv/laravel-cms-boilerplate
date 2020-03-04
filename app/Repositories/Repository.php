<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * The model associated with the service.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Create a new service instance.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Get model instance by id.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function update(Model $model, array $attributes): bool
    {
        return $model->update($attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function destroy(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function restore(Model $model): bool
    {
        return $model->restore();
    }

    /**
     * Eager load model relationships.
     *
     * @param string $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with(string $relations): Builder
    {
        return $this->model->with($relations);
    }
}
