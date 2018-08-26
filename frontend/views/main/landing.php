<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;

$theme = Yii::$app->theme->getSettings();
$this->title = $theme->main_title;

$this->registerMetaTag([
    'name'=>'description',
    'content'=>$theme->main_desc
]);
$this->registerMetaTag([
    'name'=>'keywords',
    'content'=>$theme->main_keys
]);

?>

<section class="main-banner">
    <?= $this->render("landing-partials/_main_banner", ["widgetSettings" => $widgetSettings]) ?>
</section>

<!--<div id="paginator">
    <div id="items"></div>
</div>-->

<section class="section bg-stars">
    <div class="container">

<?php \yii\widgets\Pjax::begin(); ?>
<?php
$dataProvider  = new ArrayDataProvider([
    'allModels' => \common\models\Company::find()->asArray()->all(),
    'pagination' => [
        'pageSize' => 3,
    ],
]);

?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'showHeader'=> false,
    'summary'=>'',
    'columns' => [
        [
            'attribute' => 'logo',
            'format' => 'raw',
            'value' => function($model)
            {
                return \yii\helpers\Html::img('/frontend/web/mt/img/'.$model['logo'], ['width' => '128px']);
            }
        ],
        'name',
        'regions',
        'reviews',
        'raiting',
    ],
]) ?>
<?php \yii\widgets\Pjax::end(); ?>
    </div>
</section>
<section class="section bg-stars">
    <div class="container">
        <?= $this->render("landing-partials/_companies_ratings_seo", ["companyRatings" => $companyRatings]) ?>

        <?= $this->render("landing-partials/_companies_ratings_teaching_seo", ["companyRatings" => $companyRatings]) ?>
    </div>
</section>

<section class="section bg-small-stars">
    <div class="container">
        <?= $this->render("landing-partials/_popular_activities_directions") ?>

        <?= $this->render("landing-partials/_companies_ratings_country", ["companyRatings" => $companyRatings, 'themeSettings' => $themeSettings]) ?>
    </div>
</section>

<section class="section bg-stars-2">
    <?= $this->render("landing-partials/_reviews", ["reviews" => $reviews]) ?>
</section>