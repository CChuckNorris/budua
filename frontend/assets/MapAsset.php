<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/map/jqvmap.min.css',
        'css/map/map-custom.css'
    ];
    public $js = [
        'js/plugins/map/jquery.vmap.min.js',
        'js/plugins/map/jquery.vmap.ukraine.js',
        'js/plugins/map/map.js',
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );


    public $depends = [
        'yii\web\YiiAsset',
    ];
}