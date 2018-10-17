
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-md-2">
                <a href="<?= Yii::$app->homeUrl; ?>" class="logo-header">
                    <img src="<?= \yii\helpers\Url::to("/img/logo-header.png")?>" alt="Seo-stars">
                </a>
            </div>
            <div id="top-menu-holder" class="col-xs-8 end-xs col-md-9 start-md">

                <?= $this->render("_menu"); ?>

            </div>
        </div>
    </div>
</header>