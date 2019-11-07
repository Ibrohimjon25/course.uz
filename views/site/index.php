<?php
use app\models\CategoryCourse;
use app\models\Message;
use app\models\Kurs;
use yii\data\Pagination;
use yii\widgets\Pjax;
use yii\helpers\Html;
?>
 <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(../img/bg-img/bg-1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 id="h4" data-animation="fadeInUp" data-delay="100ms"><?= \Yii::t('yii', 'All the courses you need')?></h4>
                                <h2 id="h2" data-animation="fadeInUp" data-delay="400ms"><?= \Yii::t('yii', 'Wellcome to our')?> <br><?= \Yii::t('yii', 'Online University')?></h2>
                                <a id="readmore" href="<?= Yii::$app->urlManager->createUrl('site/about')?>" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms"><?= \Yii::t('yii', 'Read More')?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(../img/bg-img/bg-2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 id="h4" data-animation="fadeInUp" data-delay="100ms"><?= \Yii::t('yii', 'All the courses you need')?></h4>
                                <h2 id="h2" data-animation="fadeInUp" data-delay="400ms"><?= \Yii::t('yii', 'Wellcome to our')?> <br><?= \Yii::t('yii', 'Online University')?></h2>
                                <a id="readmore" href="<?= Yii::$app->urlManager->createUrl('site/about')?>" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms"><?= \Yii::t('yii', 'Read More')?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Feature Area Start ##### -->
    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="features-content">
                        <div class="row no-gutters">
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-agenda-1"></i>
                                    <h5><a style="font-size: 18px;text-decoration: none; color: white;" href="<?= Yii::$app->urlManager->createUrl('site/category-course')?>"><?= \Yii::t('yii', 'Online Courses')?></a></h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-assistance"></i>
                                    <h5><a style="font-size: 18px;text-decoration: none; color: white;" href="<?= Yii::$app->urlManager->createUrl('site/about')?>"><?= \Yii::t('yii', 'Amazing Teachers')?></a></h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-telephone-3"></i>
                                    <h5><a style="font-size: 18px;text-decoration: none; color: white;" href="<?= Yii::$app->urlManager->createUrl('site/contact')?>"><?= \Yii::t('yii', 'Great Support')?></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Feature Area End ##### -->

    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Course Area -->
                <?php
                // $category = CategoryCourse::find()->all();
                $query = CategoryCourse::find();
                // $pages = new Pagination(['defaultPageSize'=>3,'totalCount' => $query->count()]);
                
                $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
                $category = $query->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
                ?>
                <?php foreach($category as $cat): ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div style="background-image: url('/img/<?= $cat['img']?>');" class="course-icon">
                        </div>
                        <div class="course-content">
                            <a style="text-decoration: none; color: #79C143" href=""><h4><?= $cat->getNameUz()?></h4></a>
                            <p><?= $cat->getDescriptionUz()?></p>
                            
                        </div>
                    </div>
                </div>
                <?php endforeach?>
                <?php
                    echo yii\widgets\LinkPager::widget([
                        'pagination'=>$pages
                    ]);
                ?>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(../img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                        <h3><?= \Yii::t('yii', 'See what our satisfied customers are saying about us')?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Testimonials Area -->
                <?php
                    // $message = Message::find()->all();
                    $query = Message::find();            
                    $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4]);
                    $message = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                ?>
                <?php foreach($message as $mes): ?>
                    <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                        <div class="testimonial-thumb">
                            <img src="/img/<?= $mes['img']?>" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5><?= $mes->getTitleUz()?></h5>
                            <p><?= $mes->getDescriptionUz()?></p>
                            <h6><span><?= $mes->getNameUz()?></span> </h6>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
                <?php
                    echo yii\widgets\LinkPager::widget([
                        'pagination'=>$pages
                    ]);
                ?>
            </div>
            
        </div>
    </div>
    <!-- ##### Testimonials Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <h3><?= \Yii::t('yii', 'Top Popular Courses')?></h3>
                    </div>
                </div>
            </div>
             <div class="row">
               
                <!-- Single Top Popular Course -->
                <?php
                    // $m = filesize('web/fayl/'.$model[0]['fayl']);
                $m = Yii::getAlias('@webroot').'/fayl/'.$model[0]['fayl'];
                ?>
                <?php
                    $model = Kurs::find()->where(['>','points', 20])->all();
                ?>
                <?php foreach($model as $cur): ?>
                <div class="col-12 col-lg-6">
                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                        <div class="popular-course-content">
                            <h5><?= $cur->getNameUz()?></h5>
                            <span><?= $cur->getTeacherUz()?>   |  <?= $cur['date']?></span>
                            <div class="course-ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p><?= $cur->getDescriptionUz()?></p>
                             <?php
                                $m = Yii::getAlias('@webroot').'/fayl/'.$cur['fayl'];
                                if (filesize($m) > 1024) {
                                    $size = filesize($m)/1024;
                                    $size = floor($size);
                                    echo 'size: '.$size.' kb'.'<br>';    
                                }else{
                                    if (filesize($m) < 1024) {
                                    $size = filesize($m);
                                    $size = floor($size);
                                    echo 'size: '.$size.' B'.'<br>';    
                                }else{
                                    if (filesize($m) > 1024*1024) {
                                    $size = filesize($m)/1024;
                                    $size = floor($size);
                                    echo 'size: '.$size.' Mb'.'<br>';    
                                }
                                }}
                                

                                
                            ?>
                            <?php 
                                echo Html::a('Download', ['site/download', 'id'=>$cur['id']], ['class'=>'btn btn-primary']);
                                
                            ?>
                        </div>
                        <div class="popular-course-thumb bg-img" style="background-image: url('../img/<?= $cur['img']?>');"></div>
                    </div>
                </div>    
                <?php endforeach?>
                
             </div> --> 
           
    </div>
    <!-- ##### Top Popular Courses Area End ##### -->

    <!-- ##### Partner Area Start ##### -->
    <div class="partner-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
                        <a href="#"><img src="../img/clients-img/partner-1.png" alt=""></a>
                        <a href="#"><img src="../img/clients-img/partner-2.png" alt=""></a>
                        <a href="#"><img src="../img/clients-img/partner-3.png" alt=""></a>
                        <a href="#"><img src="../img/clients-img/partner-4.png" alt=""></a>
                        <a href="#"><img src="../img/clients-img/partner-5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Partner Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <!-- ##### CTA Area End ##### -->