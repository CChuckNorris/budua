<?php


namespace backend\modules\blog\modules\dashboard\managers;

use backend\modules\blog\modules\dashboard\models\Category;

/**
 * Class CategoriesManager
 * @package backend\modules\blog\modules\dashboard\models
 */
class CategoriesManager
{
    protected $repository;

    private $data;

    /**
     * TagsManager constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->repository = $category;
    }

    public function getAll()
    {
        return $this->repository->find()->asArray()->all();
    }

    public function getEntity()
    {
        return $this->repository;
    }

    public function getEntityID()
    {
        return $this->repository->id;
    }

    public function findEntityByID($id)
    {
        $this->repository = $this->repository->findOne($id);
        return $this->repository;
    }

    public function findBySlug($slug)
    {
        $this->repository = $this->repository->find()->where(["slug" => $slug])->one();
        return $this->repository;
    }

    public function load($requestData)
    {
        if ($this->repository->load($requestData))
            return true;

        return false;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function save()
    {
        if ($this->load($this->data)) {

            if ($this->repository->save()) {
                return true;
            }
        }
        return false;
    }

    public function delete()
    {
        $this->repository->delete();
    }
}