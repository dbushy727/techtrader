<?php

namespace TechTrader\Repos;

abstract class RepoMan
{
    /**
     * Model that is being used
     *
     * @var object
     */
    protected $model;

    /**
     * Find a model
     *
     * @param  int $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Delete a model
     *
     * @param  int
     * @return int
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * Create and persist model instance
     *
     * @param  array  $params
     * @return object
     */
    public function create(array $params)
    {
        return $this->model->create($params);
    }

    /**
     * Update and return model instance
     *
     * @param  int    $id
     * @param  array  $params
     * @return object
     */
    public function update($id, array $params)
    {
        $model = $this->find($id);

        $model->update($params);

        return $model;
    }
}
