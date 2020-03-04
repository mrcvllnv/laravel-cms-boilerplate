<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get all instances of model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): Collection;

    /**
     * Get model instance by id.
     *
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find(int $id): Model;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(array $attributes): Model;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return boolean
     */
    public function update(Model $model, array $attributes): bool;

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function destroy(Model $model);

    /**
     * Restore the specified resource from storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function restore(Model $model);

    /**
     * Eager load model relationships.
     *
     * @param string $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with(string $relations): Builder;
}
