<?php
/**
 * @var \common\models\ActivityDirection $activity
 * @var \common\models\Region $region
 */

$this->title = $region->seo_title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $region->seo_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $region->seo_key
]);

?>


<div class="pinned-block">

    <div class="align-center">
        <h1 class="section-title lined bottom-offset"><?= $region->h1_title; ?></h1>
    </div>

    <?= \frontend\components\RatingSortControlsWidget::widget(
        [
            "sort" => $sort,
            "sort_desc" => $sort_desc
        ]);
    ?>

    <?= \frontend\components\FullCompaniesRatingWidget::widget(['items' => $items]) ?>
</div>


<?php if (!empty($region->about)):?>
    <div class="section-subtitle small top-offset align-left md-align-center"><h2>О застройщиках региона <?= $region->name; ?></h2></div>
    <div class="paragraph vertical-offset align-left md-align-center">
        <?= $region->about?>
    </div>
<?php endif; ?>
