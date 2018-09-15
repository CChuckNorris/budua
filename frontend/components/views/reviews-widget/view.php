<div class="row middle-xs review-section">
    <?php if (isset($comments[0])): ?>
        <?= \frontend\components\ReviewsSortControlsWidget::widget(
            [
                "gist" => $gist,
                "entity_id" => $entity_id,
                "sort" => $sort,
                "sort_desc" => $sort_desc
            ]);
        ?>

    <?php endif; ?>
</div>

<div id="sortreviews">
    <?= \frontend\components\UserReviewsWidget::widget(["items" => $comments]); ?>
</div>


<?php if (empty($comments)): ?>
    <div class="row">
        <div style="width: 100%" class="alert alert-warning" role="alert">Отзывов пока что нет.</div>
    </div>
<?php endif; ?>

