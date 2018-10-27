<?php ;

use kartik\tabs\TabsX;

\frontend\assets\ProfileAsset::register($this);
$this->title = $company->seo_title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $company->seo_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $company->seo_keys
]);
?>

<?= $this->render("company-partials/_head_info", ["company" => $company]) ?>

<?= $this->render("company-partials/_info", ["company" => $company]) ?>

<?= $this->render("company-partials/_about", ["company" => $company]) ?>

<?php if (!empty($company["casesFiles"])): ?>
    <?= \frontend\components\CompanyImageCarouselWidget::widget(["items" => $company["casesFiles"]]) ?>
<?php endif; ?>


<?= $this->render('company-partials/_extra_data', ['company' => $company])?>

<?php if (!empty($company["activities"])): ?>
<div class="row">
    <div class="col-md-12 promotion">
        <?= \frontend\components\CompanyActivityDirectionsWidget::widget(["items" => $company["activities"]]) ?>
    </div>
</div>

<?php endif; ?>

<?php


$items = [
    [
        'label' => '<h2>Отзывы о компании '.$company['name'].'</h2>',
        'content' => $this->render("company-partials/_reviews", [
            "model" => $model,
            "company" => $company,
            "comments" => $comments,
            "sort" => $sort,
            "sort_desc" => $sort_desc,
            "alias" => $alias,
            "fbhref" => $fbhref,
            "vkhref" => $vkhref
        ]),
        'active' => true
    ],
    [
        'label' => '<h2>Новости</h2>',
        'content' => \frontend\components\SocialNewsWidget::widget(
            [
                "entity" => $company,
                "vk_wall" => $wall,
                "fb_wall" => $fb_wall,
                "cache_duration" => $wall_cach
            ]),
        'active' => false
    ]
];
?>
    <div class="row">
        <div class="col-md-12 reviews-news">
            <?php
            echo TabsX::widget([
                'items' => $items,
                'position' => TabsX::POS_ABOVE,
                'encodeLabels' => false,
                'enableStickyTabs' => true
            ]);

            ?>
        </div>
    </div>

<?= $this->render("/layouts/_h-banner-template"); ?>


<?= $this->render("/alerts/_auth_alert") ?>