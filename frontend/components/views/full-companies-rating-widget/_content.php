<?php
$badgeClass = $widget->getBadgeLabel($model);
?>

<li class="stage-little <?= $badgeClass; ?>">
    <table>
        <tr>
            <td class="numb"><?= $key + 1; ?></td>
            <td class="logo">
              <a href="<?= $widget->getCompanyLink($model['alias'])?>"  data-pjax="false">
                <?= \yii\helpers\Html::img($widget->getLogoPath($model)) ?>
              </a>
            </td>
            <td class="company">
                <div class="md-hidden">
                    <a href="<?= $widget->getCompanyLink($model['alias'])?>"  data-pjax="false">
                        <?= $model['name']; ?>
                    </a>
                </div>
                <div class="md-visible">
                    <div class="company-title" data-toggle="#row-<?= $key + 1; ?>"><?= $model['name'] ?></div>
                    <div id="row-<?= $key + 1; ?>" class="content">
                        <div class="cell">
                            <div class="title">Регион:</div>
                            <div class="value light">
                                <?= $widget->getLimitedRegions($model['regions']); ?>
                            </div>
                        </div>

                        <a href="<?= $widget->getCompanyLink($model['alias']) ?>" class="more-link"  data-pjax="false">
                            Подробнее<i class="icon icon-right-arrow" ></i>
                        </a>
                    </div>
                </div>
            </td>
            <td class="md-none">
                <p class="tip">Регионы</p>
                <p class="none-margin">
                    <?= $widget->getLimitedRegions($model['regions']); ?>
                </p>
            </td>
            <td>
                <p class="tip">Рейтинг</p>
                <p class="none-margin">
                    <?= $model['mod_rating'] ?>
                </p>
            </td>
            <td>
                <p class="tip">Отзывы</p>
                <p class="none-margin"><?= $model['reviews'] ?></p>
            </td>
        </tr>
    </table>
</li>