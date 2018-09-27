<?php
/**
 * @var \common\models\ActivityDirection $activity
 */

$this->title = "Застройщики региона " . $region;
?>

<div class="pinned-block">

    <div class="align-center">
        <h1 class="section-title lined bottom-offset">Застройщики региона <?= $region; ?></h1>
    </div>

    <?= \frontend\components\RatingSortControlsWidget::widget(
        [
            "sort" => $sort,
            "sort_desc" => $sort_desc
        ]);
    ?>

    <?= \frontend\components\FullCompaniesRatingWidget::widget(['items' => $items]) ?>
</div>

