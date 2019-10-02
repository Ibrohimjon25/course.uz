<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        "css/style.css",
        "css/bootstrap.min.css",
        "css/owl.carousel.min.css",
        "magnific-popup.css",
        "css/font-awesome.min.css",
        "css/custom-icon.css",
        "css/classy-nav.min.css",
        "css/animate.css"
        
    ];
    public $js = [
        "js/jquery/jquery-2.2.4.min.js",
        "js/bootstrap/popper.min.js",
        "js/bootstrap/bootstrap.min.js",
        "js/plugins/plugins.js",
        "js/active.js",
        "js/extention/choices.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapPluginAsset',
    ];
}
