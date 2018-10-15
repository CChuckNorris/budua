<?php
/**
 * @var \common\models\ActivityDirection $activity
 */

$this->title = $activity->seo_title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $activity->seo_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $activity->seo_keys
]);

?>

<div class="pinned-block">

    <div class="align-center">
        <h1 class="section-title lined bottom-offset"><?= $activity->h1_title; ?></h1>
    </div>

    <?= \frontend\components\RatingSortControlsWidget::widget(
        [
            "sort" => $sort,
            "sort_desc" => $sort_desc,
            "activity_alias" => $activity->alias
        ]);
    ?>

    <?= \frontend\components\FullCompaniesRatingWidget::widget(['items' => $items]) ?>
</div>


<?php if (!empty($activity->about)):?>
    <div class="section-subtitle small top-offset align-left md-align-center"><h2>О <?= $activity->title; ?></h2></div>
    <div class="paragraph vertical-offset align-left md-align-center">
        <?= $activity->about?>
    </div>
<?php endif; ?>
