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
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

//        $result[] = $this->startConditions()->all();
//
//        $result[] = $this
//            ->startConditions()
//            ->select('blog_categories.*',
//                \DB::raw('CONCAT (id, ". ", title) AS title'))
//            ->toBase()
//            ->get();
        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Get categories
     * @param null $perPage
     * @return mixed
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);
        //dd($result);
        return $result;
    }
}