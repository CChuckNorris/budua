<?php

use yii\widgets\Breadcrumbs;
use yii\widgets\ListView;

echo Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        'Блог'
    ],
]);

?>

    <h1 class="text-center">Все статьи</h1>
    <div class="row blog">
   <?= $this->render("_list", ["dataProvider" => $dataProvider])?>

    </div>

