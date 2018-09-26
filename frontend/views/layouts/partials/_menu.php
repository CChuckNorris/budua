<?php
use yii\helpers\Url;
?>
<ul class="main-menu" data-desktop="#desktopMainMenu" data-tablet="#tabletMainMenu">
    <li><?= \yii\helpers\Html::a("Застройщики Киева", Url::toRoute(['page/zastroyschiki-kieva'])); ?></li>
    <li><?= \yii\helpers\Html::a("Застройщики Одессы", Url::toRoute(['page/zastroyschiki-odessy'])); ?></li>
    <li><?= \yii\helpers\Html::a("Застройщики Харькова", Url::toRoute(['page/	zastroyschiki-harkova'])); ?></li>
</ul>