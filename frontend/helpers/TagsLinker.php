<?php

namespace frontend\helpers;

/**
 * Class TagsLinker
 * @package frontend\helpers
 */
class TagsLinker
{

    public function getLinked($tags)
    {
        $links = [];

        foreach ($tags as $tag) {
            $links[] = \yii\helpers\Html::a($tag["name"], \yii\helpers\Url::toRoute('/blog/tags/' . $tag["slug"]),["data-pjax" => 0]);
        }

        return implode(", ", $links);
    }

}