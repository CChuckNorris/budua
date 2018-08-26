<div class="testimonial-card border <?= $widget->getColoredClass($model["stars"])?>">

    <div class="round-photo">
        <div class="image-cover">
            <?php if ($anon = $widget->isAnon($model["user"])): ?>
                <?= \yii\helpers\Html::img( $widget->getAnonAvatar(), ["alt" => $anon])?>
            <?php else: ?>
                <?= \yii\helpers\Html::img( $widget->getUserAvatarLink($model["user"]), ["alt" => $model["user"]["name"]])?>
            <?php endif;?>
        </div>
    </div>
    <div class="info">
        <div class="name">
            <?php if ($anon = $widget->isAnon($model["user"])): ?>
                <?= $anon; ?>
            <?php else: ?>
                <?= \yii\helpers\Html::a($model["user"]["name"], $widget->getUserProfileLink($model["user"]), ["target" => "_blank"])?>
            <?php endif;?>

        </div>
        <div class="date"> <?= $widget->getDateByFormat($model["date"]);?></div>
        <div class="star-rating">
            <?= $widget->getStarsWidget($model["stars"]);?>
        </div>
    </div>

    <div class="text">
        <?=$model["text"];?>
    </div>
    <div class="rating align-right">
        <div class="title">Рейтинг отзыва:</div>
        <div class="buttons">
            <button type="button" class="up"  onclick="likecomm(<?= $model["id"]; ?>)"><i class="icon icon-angle-arrow-down"></i></button>
            <div class="value"><?= $model["likes"]; ?> </div>
            <button type="button"  onclick="dislikecomm(<?= $model["id"]; ?>)" class="down"><i class="icon icon-angle-arrow-down"></i></button>
        </div>
    </div>

</div>