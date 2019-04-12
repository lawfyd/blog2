<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Репозиторий работы с сущностю.
 * Может выдавать наборы данных.
 * Неможет изменять сущность.
 *
 * Class CoreRepository
 * @package App\Repositories
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        //$this->model = app('App\Models\BlogCategory');
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}