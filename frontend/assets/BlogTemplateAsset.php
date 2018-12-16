<?php

namespace frontend\assets;


/**
 * Main frontend application asset bundle.
 */
class BlogTemplateAsset extends TemplateV2Asset
{

    public $css = [
        'css/blog.css'
    ];
    public $js = [
        'js/init/data-toggle.js',
        'js/init/mobile-menu.js',
        'js/main.js',
        'js/review-controls.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'frontend\assets\TemplateV2Asset'
    ];
}
