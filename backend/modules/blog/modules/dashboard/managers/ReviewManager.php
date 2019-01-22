<?php


namespace backend\modules\blog\modules\dashboard\managers;

use backend\modules\blog\modules\dashboard\models\Reviews;
use common\models\Review;

/**
 * Class ReviewManager
 * @package backend\modules\blog\modules\dashboard\models
 */
class ReviewManager
{
    /** @var Reviews $repository **/
    protected $repository;

    /** @var \yii\web\Request */
    private $data;


    /**
     * PostManager constructor.
     * @param Reviews $review
     */
    public function __construct(Reviews $review)
    {
        $this->repository = $review;
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
        $this->repository = $this->repository->find()->where(["id" => $id])->one();
        return $this->repository;
    }

    /**
     * @param $post_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getReviewsByPostID($post_id)
    {
        return $this->repository->find()
            ->where(["post_id" => $post_id])
            ->orderBy("date DESC")->asArray()->all();
    }

    public function load($requestData)
    {
        if ($this->repository->load($requestData, ''))
            return true;

        return false;
    }

    /**
     * @param \yii\web\Request $data
     */
    public function setData(\yii\web\Request $data)
    {
        $this->data = $data;
    }

    public function getPostID()
    {
        return $this->repository->post_id;
    }

    public function save()
    {
        if ($this->load($this->data->post())) {

           $this->setDate();
           $this->setIP();

            if ($this->repository->save()) {
                return true;
            }
        }
        return false;
    }

    public function getErrors()
    {
        return $this->repository->getErrors();
    }

    protected function setDate()
    {
        $this->repository->date = date("Y-m-d h:i:s", time());
    }

    protected function setIP()
    {
        $this->repository->ip = $this->data->getUserIP();
    }

    public function delete()
    {
        $this->repository->delete();
    }
}