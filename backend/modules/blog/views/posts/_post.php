<?php

use yii\widgets\Breadcrumbs;

$this->title = $model->seo_title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->seo_description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->seo_keys
]);

echo Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Блог',
            'url' => ['/blog'],
        ],
        [
            'label' => 'Статьи',
            'url' => ['/blog/posts'],
        ],
        $model->title,
    ],
]);

?>

<div class="col-md-12 single">
    <div class="row">
        <div class="col-md-6">
            <p class="category">Рубрика: <?=  \yii\helpers\Html::a($model->category->name, \yii\helpers\Url::toRoute('/blog/categories/' . $model->category->slug)); ?></p>
        </div>
        <div class="col-md-6">
            <p class="date text-right">
                Дата публикации: <?= date("Y-m-d h:i", strtotime($model->published_at)); ?>
            </p>
        </div>
    </div>
    <hr/>

    <div class="row content">
        <div class="col-md-12">
            <div class="title">
                <h1><?= $model->h1_title; ?></h1>
            </div>
            <div class="preview">
                <?= \yii\helpers\Html::img($model->preview_m);?>
            </div>
            <?= $model->text; ?>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-6">
            <p class="tags">Теги: <?= (new \frontend\helpers\TagsLinker())->getLinked($model->tags); ?></p>
        </div>
    </div>

</div>


<?= $this->render("partials/_reviews", ["post_id" => $model->id, "reviews" => $reviews]);?>