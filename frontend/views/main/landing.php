<?php

use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;
use common\managers\WidgetSettingsProvider;
use common\models\WidgetsSettings;
use yii\helpers\Url;
use yii\helpers\Html;

$theme = Yii::$app->theme->getSettings();
$this->title = $theme->main_title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $theme->main_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $theme->main_keys
]);

/**
 * @var WidgetSettingsProvider $widgetSettingsProvider
 */
 $widgetSettingsProvider = new WidgetSettingsProvider(new WidgetSettingsDataMapper(new WidgetsSettings()), new WidgetsNamesHolder());

 $infoBlock1 = $widgetSettingsProvider->getInfoBlock1WidgetSettings();
?>

<section class="main-banner">
    <?= $this->render("landing-partials/_counters", ["widgetSettings" => $widgetSettings]) ?>
</section>

<section class="section map">
    <div class="container">
        <?= \frontend\components\MapWidget::widget(); ?>
    </div>
</section>


<section class="section bg pattern">
    <div class="align-center">
        <h2 class="section-title lined bottom-offset">Лучшие застройщики</h2>
    </div>
    <div class="row">
        <?= \frontend\components\CompaniesLogosGridWidget::widget(["items" => $companyRatings->getTopCompanies(), "target_url" => "main/company", "template" => 3]) ?>
    </div>
    <div class="row">
        <?= Html::a("Все застройщики", Url::to('/rating'), ['class' => 'btn btn-rounded']) ?>
    </div>
</section>

<section class="section activity-directions">
    <div class="container">
        <div class="row"><?= \frontend\components\PopularActivityDirectionsWidget::widget() ?>
        </div>
    </div>
</section>

<section class="section info-block">
    <div class="row">
        <div class="container">
            <div class="col-md-6 content-holder">
                <div class="info">
                    <h2 class="section-title lined bottom-offset"> <?= $infoBlock1->getHeader() ?></h2>
                    <div class="content">
                        <?= $infoBlock1->getContent() ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <?= Html::img($infoBlock1->getPlaceholder()) ?>
            </div>
        </div>
    </div>
</section>



<section class="section recent-reviews">
    <div class="align-center">
        <h2 class="section-title lined bottom-offset">Последние отзывы</h2>
    </div>
    <div class="row">
        <div class="col-xs-12 col-lg-10 col-lg-offset-1">
            <?= \frontend\components\CompanyLastReviewsWidget::widget(["items" => $reviews])?>
        </div>
    </div>
</section>