<div class="testimonial-card border <?= $widget->getColoredClass($model["stars"]) ?>">

    <div class="row">
        <div class="col-md-2 round-photo">
            <div class="image-cover">
                <?php if ($anon = $widget->isAnon($model["user"])): ?>
                    <?= \yii\helpers\Html::img($widget->getAnonAvatar(), ["alt" => $anon]) ?>
                <?php else: ?>
                    <?= \yii\helpers\Html::img($widget->getUserAvatarLink($model["user"]), ["alt" => $model["user"]["name"]]) ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row info">
                <div class="col-md-6 text-left name">
                    <?php if ($anon = $widget->isAnon($model["user"])): ?>
                        <span><?= $anon; ?></span>
                    <?php else: ?>
                    <span> <?= \yii\helpers\Html::a($model["user"]["name"], $widget->getUserProfileLink($model["user"]), ["target" => "_blank"]) ?></span>
                    <?php endif; ?>
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
        <div class="col-md-6 date">
            <?= $widget->getDateByFormat($model["date"]); ?>
        </div>
        <div class="col-md-6">
            <div class="rating align-right">
                <div class="title">Рейтинг отзыва:</div>
                <div class="buttons">
                    <button type="button" class="up" onclick="likecomm(<?= $model["id"]; ?>)"><i
                                class="icon icon-angle-arrow-down"></i></button>
                    <div class="value"><?= $model["likes"]; ?> </div>
                    <button type="button" onclick="dislikecomm(<?= $model["id"]; ?>)" class="down"><i
                                class="icon icon-angle-arrow-down"></i></button>
                </div>
            </div>
        </div>
    </div>

</div>