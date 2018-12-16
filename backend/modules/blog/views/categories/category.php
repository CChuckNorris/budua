<?php
$this->title = $model->seo_title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->seo_description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->seo_keys
]);

use yii\widgets\Breadcrumbs;

echo Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Блог',
            'url' => ['/blog'],
        ],
        [
            'label' => 'Рубрики',
            'url' => ['/blog/posts'],
        ],
        $model->name,
    ],
]);
?>

<h1>
    Рубрика <?= $model->name; ?>
</h1>

<?= $this->render("/posts/_list", ["dataProvider" => $dataProvider])?>