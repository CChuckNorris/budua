<div class="row middle-xs review-section">
    <div class="col-xs-12 col-md-6">
        <div class="section-subtitle small top-offset-small bottom-offset-large align-left md-align-center">
            Комментарии
        </div>
    </div>
    <?php if (isset($comments[0])): ?>
        <?= \backend\modules\blog\widgets\ReviewsSortControlsWidget::widget(
            [
                "entity_id" => $entity_id,
                "sort" => $sort,
                "sort_desc" => $sort_desc
            ]);
        ?>

    <?php endif; ?>
</div>

<div id="sortreviews">
    <?= \backend\modules\blog\widgets\PostsReviewsWidget::widget(["items" => $comments]); ?>
</div>


