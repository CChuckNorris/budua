<?php

/* @var $this yii\web\View */

$this->title=$page->seo_title;

$this->registerMetaTag([ 
    'name'=>'description', 
    'content'=>$page->seo_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$page->seo_keys
]);
?>


<div class="pinned-block">

    <div class="align-center">
        <h1 class="section-title lined bottom-offset">
            <?php if ($page->h2): ?>
                <?= $page->h2; ?>
            <?php else: ?>
                <?= $page->h1; ?>
            <?php endif; ?></h1>
    </div>

    <?= \frontend\components\RatingSortControlsWidget::widget(
        [
            "sort" => $sort,
            "sort_desc" => $sort_desc
        ]);
    ?>

    <?= \frontend\components\FullCompaniesRatingWidget::widget(['items' => $companies]) ?>
</div>
