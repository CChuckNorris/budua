
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="<?= Yii::$app->homeUrl; ?>" class="logo-header">
                    <img src="<?= \yii\helpers\Url::to("/img/logo-header.png")?>" alt="Seo-stars">
                </a>
            </div>
            <div id="top-menu-holder" class="col-md-9">

                <?= $this->render("_menu"); ?>

            </div>
        </div>
    </div>
</header>