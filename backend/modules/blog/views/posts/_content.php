<?php
use yii\helpers\Url;
?>


<div class="col-md-12 post">
    <div class="col-md-3 cover">
        <?=
        \yii\helpers\Html::img($model["preview_m"], ["width" => "100%"])?>
    </div>
    <div class="col-md-9 content">
        <div class="category">
            <span><span class="title">Рубрика:</span>
                <?= \yii\helpers\Html::a($model["category"]["name"],
                    \yii\helpers\Url::toRoute('/blog/categories/' . $model["category"]["slug"]), ["data-pjax" => 0]); ?> </span>
        </div>
        <h2>
            <?= \yii\helpers\Html::a($model["title"], Url::toRoute(["posts/".$model['slug']]), ["data-pjax" => 0]); ?>

        </h2>
        <div class="tags">
            <span><span class="title">Теги:</span> <?= (new \frontend\helpers\TagsLinker())->getLinked($model["tags"]);?></span>
        </div>
    </div>
    <div class="footer">
        <div class="col-md-12 text-right">
            <?= date("Y-m-d h:i", strtotime($model["published_at"]))?>
        </div>
    </div>
</div>


