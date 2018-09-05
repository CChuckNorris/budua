<?php
/* @var $this \yii\web\View */

/* @var $content string */


\frontend\assets\CommonTemplateAsset::register($this);
?>

<?php $this->beginPage() ?>

<?= $this->render("header-layout-v2") ?>
    <body>
    <?php $this->beginBody() ?>
    <header class="main-header none-margin">
        <?= $this->render("partials/_top_site_bar"); ?>

        <main>
            <section class="common-banner"></section>
            <section class="section none-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-9 none-padding">
                            <?= $content; ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <?= $this->render("partials/_right_sidebar") ?>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        <?= $this->render("footer-layout-v2"); ?>

        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>