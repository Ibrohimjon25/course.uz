<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- <link rel="stylesheet" type="text/css" href="/backend/css/site.css"> -->
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="/backend/css/theme-default.css"/>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?= Url::to(['../site/index'])?>">ACADEMIC</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="/backend/assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img style="width: 80px; height: 90px" src="/img/<?=Yii::$app->user->identity->img?>" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= Yii::$app->user->identity->username?></div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                            <!-- <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div> -->
                        </div>                                                                        
                    </li>

                    <li class="xn-title">Jadvallar</li>
                    <li class="<?= Yii::$app->helper->getActiveItem(Yii::$app->controller->id, "category-course")?>">
                        <a href="<?= Url::to(['/coder-admin/category-course'])?>"><span class="fa fa-table"></span> <span class="xn-text">Kurs Kategoriya</span></a>                        
                    </li>
                    <li class="<?= Yii::$app->helper->getActiveItem(Yii::$app->controller->id, "kurs")?>">
                        <a href="<?= Url::to(['/coder-admin/kurs'])?>"><span class="fa fa-table"></span> <span class="xn-text">Kurs</span></a>                        
                    </li>
                    <li class="<?= Yii::$app->helper->getActiveItem(Yii::$app->controller->id, "message")?>">
                        <a href="<?= Url::to(['/coder-admin/message'])?>"><span class="fa fa-table"></span> <span class="xn-text">Message</span></a>                        
                    </li>
                    <li class="<?= Yii::$app->helper->getActiveItem(Yii::$app->controller->id, "teacher")?>">
                        <a href="<?= Url::to(['/coder-admin/teacher'])?>"><span class="fa fa-table"></span> <span class="xn-text">Teacher</span></a>                        
                    </li>
                    <li class="<?= Yii::$app->helper->getActiveItem(Yii::$app->controller->id, "pictures")?>">
                        <a href="<?= Url::to(['/coder-admin/pictures'])?>"><span class="fa fa-table"></span> <span class="xn-text">Pictures</span></a>                        
                    </li>
                    <li class="<?= Yii::$app->helper->getActiveItem(Yii::$app->controller->id, "bookk")?>">
                        <a href="<?= Url::to(['/coder-admin/bookk'])?>"><span class="fa fa-table"></span> <span class="xn-text">Bookk</span></a>                        
                    </li>
                    <li class="<?= Yii::$app->helper->getActiveItem(Yii::$app->controller->id, "user")?>">
                        <a href="<?= Url::to(['/coder-admin/user'])?>"><span class="fa fa-table"></span> <span class="xn-text">Users</span></a>                        
                    </li>
                    
                    
                </ul>
                <!-- END X-NAVIGATION -->

            </div>
            <!-- END PAGE SIDEBAR -->
            <div class="page-content">
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                   
                </ul>
            
                <!-- content -->
                <?= $content?>
                <!-- /content -->
            </div>
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->     
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
