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
}