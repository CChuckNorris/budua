<?php
use yii\helpers\Url;

?>
<footer class="main-footer bg2 pattern">
    <div class="container">
        <div class="row center-xs start-ms">
            <div class="col-xs-12 col-ms-2 ">
                <a href="<?=Url::toRoute(['main/index']);?>" class="logo-footer">
                    <img src="<?=\yii\helpers\Url::to("/img/logo-white.png")?>" alt="Seo-stars">
                </a>
            </div>
            <div class="col-xs-12 col-ms-2 col-sm-2">
                <ul class="footer-menu">
                    <li>
                        <a href="<?=Url::toRoute(['main/index']);?>">Главная</a>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['/app']);?>">Заявка на продвижение</a>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['main/pages']);?>">Карта сайта</a>
                    </li>
                    <li>
                        <a href="<?= Url::toRoute(['main/contact']);?>">Контакты</a>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['main/about']);?>">О сайте</a>
                    </li>
                </ul>
            </div>

            <div class="col-xs-12 col-ms-2 footer-menu">
                <?= Yii::$app->theme->getFooterLinks();?>
            </div>

            <div class="col-xs-12 col-ms-2 footer-menu">
                <?= Yii::$app->theme->getFooterLinks2();?>
            </div>

            <div class="col-xs-12 col-ms-2">
                <ul class="social-list">
                    <li>
                        <a href="https://www.facebook.com/SEO-Stars-TOP-336355266796266/" target="_blank"><i class="icon icon-facebook-6"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCnuuKjaqyDSUT4Xt1PDMmXQ/" target="_blank"><i class="icon icon-youtube-2"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

