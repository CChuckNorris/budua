<?php

use yii\helpers\Url;

$limit = 3;
?>

<div class="logo-company-rating-widget template3">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <ul class="rating-companies-list">
            <?php foreach ($items as $key => &$item): ?>
                <?php if ($key < $limit): ?>
                    <li>
                        <div class="image-contain">
                            <a href="<?= Url::toRoute([$widget->getTargetUrl(), 'alias' => $item['alias']]); ?>"
                               class="link">
                                <img src="<?= $widget->getLogoPath($item); ?>" alt="<?= $item['name']; ?>"/>
                            </a>

                        </div>
                        <div class="name-contain">
                            <?= $item['name']; ?>
                        </div>
                        <div class="region-contain">
                            <?= $widget->getRegionsList($item['regions']); ?>
                        </div>

                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

        </ul>
    </div>
    <?php
    echo $this->render("_view4-sub-items", ["items" => array_slice($items, $limit + 2), "widget" => $widget]);
    ?>
</div>
