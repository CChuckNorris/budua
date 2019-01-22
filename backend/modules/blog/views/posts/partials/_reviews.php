<?php

?>

<div class="reviews clearfix">
    <?= $this->render("/reviews/index", ["post_id" => $post_id, "reviews" => $reviews]);?>
</div>