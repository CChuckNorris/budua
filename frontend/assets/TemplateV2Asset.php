<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class TemplateV2Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bundle.css',
        'css/landing.css',
        'css/custom.css',
        'css/slicknav.css'

    ];
    public $js = [
        'js/init/data-toggle.js',
        'js/init/jquery.slicknav.js',
        'js/init/mobile-menu.js',
        'js/main.js',
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );


    public $depends = [
        'yii\web\YiiAsset',
    ];
}
