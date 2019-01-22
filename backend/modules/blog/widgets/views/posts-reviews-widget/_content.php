<div class="testimonial-card border <?= $widget->getColoredClass($model["stars"]) ?>">

    <div class="row">
        <div class="col-md-2 round-photo">
            <div class="image-cover">
                <?= \yii\helpers\Html::img($widget->getAnonAvatar(), ["alt" => $widget->getAnonName()]) ?>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row info">
                <div class="col-md-6 text-left name">
                    <span><?= $widget->getAnonName(); ?></span>
                </div>
                <div class="col-md-6 text-right star-rating">
                    <?= $widget->getStarsWidget($model["stars"]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="text">
        <?= $model["text"]; ?>
    </div>

    <div class="row">
        <div class="col-md-12 date text-right">
            <?= $widget->getDateByFormat($model["date"]); ?>
        </div>

    </div>

</div>