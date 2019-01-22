<?php

namespace backend\modules\blog\widgets;

use yii\base\Widget;

class ReviewFormWidget extends Widget
{
    private $base_url;

    public $post_id;

    public function init()
    {
        parent::init();

        $this->base_url = \Yii::$app->request->getHostInfo().\Yii::$app->request->getUrl();
    }

    public function run()
    {
        return $this->render("review-form-widget/view", ["widget" => $this]);
    }

    public function getPostID()
    {
        return $this->post_id;
    }
}
