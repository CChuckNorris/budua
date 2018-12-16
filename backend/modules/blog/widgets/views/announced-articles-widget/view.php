<style>
    .announced
    {
        padding: 20px 0;
    }
    .announced .title p
    {
        font-size: 18px;
        text-align: center;
        padding-top: 10px;
    }
</style>

<div class="col-md-12 announced">
<?php foreach ($posts as $post): ?>

<div class="col-md-4">
    <div class="cover">
        <?= \yii\helpers\Html::a(\yii\helpers\Html::img($post["preview_s"], ["width" => "100%", "class" => "img-rounded"]),
            \yii\helpers\Url::toRoute('/blog/posts/' . $post["slug"])); ?>

    </div>
    <div class="title">
        <p><?= \yii\helpers\Html::a($post["title"], \yii\helpers\Url::toRoute('/blog/posts/' . $post["slug"])); ?></p>
    </div>
</div>
<?php endforeach;?>
</div>
