<?php

namespace backend\modules\blog\widgets;

use backend\modules\blog\modules\dashboard\managers\PostManager;
use backend\modules\blog\modules\dashboard\models\Post;
use yii\base\Widget;

/**
 * Class AnnouncedArticlesWidget
 * @package backend\modules\blog\widgets
 */
class AnnouncedArticlesWidget extends Widget
{
    public $items;

    /** @var PostManager **/
    private $PostManager;

    public function init()
    {
        parent::init();

        $this->PostManager = new PostManager(new Post());
    }

    public function run()
    {
        return $this->render("announced-articles-widget/view", ["posts" => $this->PostManager->getAnnounced()]);
    }

    public function getItems()
    {
        return $this->items;
    }

}
