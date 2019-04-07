<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get a model for edit in admin panel
     * @param $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * get a list of categories to display in a drop-down list
     * @return Collection
     */
    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }
}