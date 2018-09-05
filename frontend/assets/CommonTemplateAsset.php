<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CommonTemplateAsset extends TemplateV2Asset
{

    public $js = [
        'js/init/data-toggle.js',
        'js/init/mobile-menu.js',
        'js/main.js',
        'js/review-controls.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
