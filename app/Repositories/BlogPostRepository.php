<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;

/**
 * Class BlogPostRepository
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate()
    {
        $perPage = 25;
        $columns = [
            'id',
            'title',
            'user_id',
            'category_id',
            'is_published',
            'published_at'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            //->with(['category', 'user'])
            ->with([
                // или так
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                },
                // или так
                'user:id,name',
            ])
            ->paginate($perPage);

        return $result;
    }
}