<?php

use backend\modules\blog\assets\BlogAsset;
use backend\modules\blog\widgets\ReviewFormWidget;
use backend\modules\blog\widgets\ReviewsWidget;

BlogAsset::register($this);

?>

<div class="col-md-12 post-reviews">
    <?= ReviewsWidget::widget(
        [
            "entity_id" => $post_id,
            "sort" => $sort,
            "sort_desc" => $sort_desc,
            "comments" => $reviews
        ]);
    ?>
</div>
<div class="col-md-12 post-reviews">
    <?= ReviewFormWidget::widget(["post_id" => $post_id]); ?>
</div>