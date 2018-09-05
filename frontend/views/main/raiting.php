<?php

/* @var $this yii\web\View */

use yii\data\ArrayDataProvider;
use yii\widgets\ListView;

$this->title = $seo->raiting_title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $seo->raiting_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $seo->raiting_keys
]);

?>
<div class="pinned-block">

    <div class="align-center">
        <h2 class="section-title lined bottom-offset"><?= $seo->raiting_h1; ?></h2>
    </div>

    <?= \frontend\components\FullCompaniesRatingWidget::widget(['items' => $companies]) ?>
</div>