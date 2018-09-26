<div class="company-info align-left clearfix">
    <div class="col-md-12 company-info-list top-offset">

        <div class="row">
            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-international-delivery"></i>
                    <span class="title">Регионы</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?php $regions_arr = explode(",", $company["regions"]);?>
                        <?php $regions_arr = array_filter(array_map("trim", $regions_arr));?>
                        <?php foreach ($regions_arr as $region):?>
                            <?= \yii\helpers\Html::a($region, \yii\helpers\Url::toRoute('regions/'.$region))?>
                        <?php endforeach;?>

                    </div>
                </div>
            </div>

            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-grid-world"></i>
                    <span class="title">Сайт</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?php if ($company["site_link"] == 1) : ?>
                            <?= \yii\helpers\Html::a($company["site"], $company["site"], ["target" => "_blank"]) ?>
                        <?php else: ?>
                            <?= \common\helpers\DefaultString::print_str($company["site"]); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-call-answer"></i>
                    <span class="title">Телефон</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?= \common\helpers\DefaultString::print_str($company["tel"]); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-mail-black-envelope-symbol"></i>
                    <span class="title">E-MAIL</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?= \common\helpers\DefaultString::print_str($company["email"]); ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-multiple-users-silhouette"></i>
                    <span class="title">Персоны</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?php if ($persons = $company->getAuthorizedPersons()): ?>
                            <?php foreach ($persons as $person): ?>
                                <p><?= mb_strtolower($person); ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-mail-black-envelope-symbol"></i>
                    <span class="title">Адрес</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?= $company->address; ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 socials item">
                    <div class="social-title">Соцсети:</div>
                    <?= \frontend\components\ProfileSocialsIconsWidget::widget(["vk_group" => $company["vk_group"], "fb_group" => $company["fb_group"]]) ?>
            </div>
            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-clock-symbol-of-circular-shape"></i>
                    <span class="title">ЭГРПОУ</span>
                </div>
                <div class="info">
                    <div class="value">32920218</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 item">

                <div class="info-header">
                    <i class="icon icon-star-3"></i>
                    <span class="title">Рейтинг</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?= $company->getRating(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 item">
                <div class="info-header">
                    <i class="icon icon-feedback-2"></i>
                    <span class="title">Отзывы</span>
                </div>
                <div class="info">
                    <div class="value">
                        <?= $company["reviews"]; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>