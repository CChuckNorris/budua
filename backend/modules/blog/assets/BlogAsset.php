<?php

namespace backend\modules\blog\assets;

use yii\web\AssetBundle;

/**
 * Class BlogAsset
 * @package backend\modules\blog\assets
 */
class BlogAsset extends AssetBundle
{
    public $sourcePath = '@blog/assets';

    public $css = [
        'css/blog.css',
        'css/reviews.css',
    ];
    public $js = [
        'js/review-controls.js',
        'js/rating.js',
        'js/jquery.form.min.js',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}