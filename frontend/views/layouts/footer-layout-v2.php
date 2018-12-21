<?php
use yii\helpers\Url;

?>
<footer class="main-footer bg2 pattern">
    <div class="container">
        <div class="row center-xs start-ms">
            <div class="col-xs-12 col-ms-2 ">
                <a href="<?=Url::toRoute(['main/index']);?>" class="logo-footer">
                    <img src="<?=\yii\helpers\Url::to("/img/logo-white.png")?>" alt="budua.top">
                </a>
            </div>

            <div class="col-xs-12 col-ms-2 footer-menu">
                <?= Yii::$app->theme->getFooterLinks();?>
            </div>

            <div class="col-xs-12 col-ms-2 footer-menu">
                <?= Yii::$app->theme->getFooterLinks2();?>
            </div>

            <div class="col-xs-12 col-ms-2">
                <ul class="social-list" style="display: none">
                    <li>
                        <a href="#" target="_blank"><i class="icon icon-facebook-6"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="icon icon-youtube-2"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

