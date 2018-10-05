<?php

/* @var $this yii\web\View */

$this->title=$page->seo_title;

$this->registerMetaTag([ 
    'name'=>'description', 
    'content'=>$page->seo_desc
]); 
$this->registerMetaTag([ 
    'name'=>'keywords', 
    'content'=>$page->seo_keys
]);
?>

<div class="align-center">
    <h1 class="section-title lined bottom-offset">
        <?php if ($page->h2): ?>
            <?= $page->h2; ?>
        <?php else: ?>
            <?= $page->h1; ?>
        <?php endif; ?></h1>
</div>

<div class="row">
    <div class="col-md-6 text-center">
        <?= $page->editor?>
    </div>
</div>

