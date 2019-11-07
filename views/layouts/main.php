<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <link rel="icon" href="../img/core-img/favicon.ico">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index.html"><img src="../img/core-img/logo.png" alt=""></a>
                            </div>
                            <!-- search -->
                            <div class="s130">
                              <form method="get" action = '<?= \yii\helpers\Url::to(['site/search', ])?>' >
                                <div class="inner-form">
                                  <div class="input-field first-wrap">
                                    <div class="svg-wrapper">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                      </svg>
                                    </div>
                                    <input id="search" name="q" type="text" placeholder="<?= \Yii::t('yii', 'SEARCH')?> ..." />
                                  </div>
                                  <div class="input-field second-wrap">
                                    <button class="btn-search h-100" type="button"><?= \Yii::t('yii', 'SEARCH')?></button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/index')?>"><?= \Yii::t('yii', 'HOME')?></a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/about')?>"><?= \Yii::t('yii', 'ABOUT US')?></a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/course')?>"><?= \Yii::t('yii', 'COURSE')?></a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/book')?>"><?= \Yii::t('yii', 'BOOKS')?></a></li>
                                    <?php if (!Yii::$app->user->isGuest): ?>
                                        <li><a href="<?= Yii::$app->urlManager->createUrl('site/contact')?>"><?= \Yii::t('yii', 'CONTACT')?></a></li>
                                    <?php endif?>
                                    <?php if (!Yii::$app->user->isGuest): ?>
                                        <li><a href="<?= Yii::$app->urlManager->createUrl("coder-admin/./")?>"><?= \Yii::t('yii', 'ADMIN')?></a></li>
                                    <?php endif?>
                                    <?php if (Yii::$app->user->isGuest): ?>
                                        <li><a href="<?= Yii::$app->urlManager->createUrl("site/register")?>"><?= \Yii::t('yii', 'REGISTER')?></a></li>
                                    <?php endif?>
                                    <?php echo
                                        Yii::$app->user->isGuest ? (
                                            "<li><a href=".Yii::$app->urlManager->createUrl('site/login')."> ".\Yii::t('yii', 'login')."</a></li>"
                                        ) : (
                                            '<li>'
                                            . Html::beginForm(['/site/logout'], 'post')
                                            . Html::submitButton(
                                                ''.\Yii::t("yii", "LOGOUT").' (' . Yii::$app->user->identity->username . ')',
                                                ['class' => 'btn btn-link logout']
                                            )
                                            . Html::endForm()
                                            . '</li>'
                                        )
                                    ?>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center row">
                                <!-- <a href="#"><img style="width: 25px; height: 25px; margin-right: 10px"  src="img/uzb.png"></a>
                                <a href="#"><img style="width: 25px; height: 25px; margin-right: 10px"  src="img/usa.png"></a>
                                <a href="#"><img style="width: 25px; height: 25px"  src="img/russia.png"></a> -->
                                <a href="/uz/<?= Yii::$app->controller->action->id?>" style="margin-right: 13px">uzb</a>
                                <a href="/en/<?= Yii::$app->controller->action->id?>" style="margin-right: 13px">en</a>
                                <a href="/ru/<?= Yii::$app->controller->action->id?>" style="margin-right: 13px">ru</a>
                            </div>
                        </div>
                    </nav>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

   <?= $content?>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="../img/core-img/logo2.png" alt=""></a>
                            </div>
                            <p><?= \Yii::t('yii', 'Our site is always ready for your service. Thanks for visiting.')?></p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6><?= \Yii::t('yii', 'USEFULL LINKS')?></h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/about')?>"><?= \Yii::t('yii', 'ABOUT US')?></a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/course')?>"><?= \Yii::t('yii', 'COURSE')?></a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/book')?>"><?= \Yii::t('yii', 'BOOKS')?></a></li>
                                    <?php if (!Yii::$app->user->isGuest): ?>
                                        <li><a href="<?= Yii::$app->urlManager->createUrl('site/contact')?>"><?= \Yii::t('yii', 'CONTACT')?></a></li>
                                    <?php endif?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6><?= \Yii::t('yii', 'GALLERY')?></h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                                <a href="img/bg-img/gallery1.jpg" class="gallery-img" title="Gallery Image 1"><img src="../img/bg-img/gallery1.jpg" alt=""></a>
                                <a href="img/bg-img/gallery2.jpg" class="gallery-img" title="Gallery Image 2"><img src="../img/bg-img/gallery2.jpg" alt=""></a>
                                <a href="img/bg-img/gallery3.jpg" class="gallery-img" title="Gallery Image 3"><img src="../img/bg-img/gallery3.jpg" alt=""></a>
                                <a href="img/bg-img/gallery4.jpg" class="gallery-img" title="Gallery Image 4"><img src="../img/bg-img/gallery4.jpg" alt=""></a>
                                <a href="img/bg-img/gallery5.jpg" class="gallery-img" title="Gallery Image 5"><img src="../img/bg-img/gallery5.jpg" alt=""></a>
                                <a href="img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 6"><img src="../img/bg-img/gallery6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contact</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>4127/ 5B-C <?= \Yii::t('yii', 'Yunusobod Tumani')?></p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p> 203-808-8613 <br>203-808-8648</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>office@yourbusiness.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>