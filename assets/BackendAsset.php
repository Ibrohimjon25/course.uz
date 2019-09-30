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
class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        "backend/js/plugins/jquery/jquery.min.js",
        "backend/js/plugins/jquery/jquery-ui.min.js",
        "backend/js/plugins/bootstrap/bootstrap.min.js",
        
        'backend/js/plugins/icheck/icheck.min.js',
        "backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js",
        "backend/js/plugins/scrolltotop/scrolltopcontrol.js",
        
        "backend/js/plugins/morris/raphael-min.js",
        "backend/js/plugins/morris/morris.min.js",
        "backend/js/plugins/rickshaw/d3.v3.js",
        "backend/js/plugins/rickshaw/rickshaw.min.js",
        'backend/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'backend/js/plugins/bootstrap/bootstrap-datepicker.js',
        "backend/js/plugins/owl/owl.carousel.min.js",      ,
        
        "backend/js/plugins/moment.min.js",
        "backend/js/plugins/daterangepicker/daterangepicker.js",
        "backend/js/settings.js",
        
        "backend/js/plugins.js",
        "backend/js/actions.js",
        
        "js/demo_dashboard.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
