<?php
use yii\helpers\Url;
?>
<ul class="main-menu" data-desktop="#desktopMainMenu" data-tablet="#tabletMainMenu">
    <?php foreach ($items as $item):?>
    <li><?= \yii\helpers\Html::a($item["link_name"], $item["link_href"], ["target" => $item["link_target"], "title" => $item["link_title"]]); ?></li>
    <?php endforeach; ?>
</ul>