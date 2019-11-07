<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Teacher;
use yii\data\Pagination;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2><?= \Yii::t('yii', 'ABOUT US')?></h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <h3><?= \Yii::t('yii', 'We are the Academy')?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <p><?= \Yii::t('yii', 'Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod. Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris. Etiam tristique magna eget velit consectetur, a tincidunt velit dictum. Cras vulputate metus id felis ornare hendrerit. Maecenas sodales suscipit ipsum.')?></p>
                </div>
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <p><?= \Yii::t('yii', 'Vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod. Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris. Etiam tristique magna eget velit consectetur, a tincidunt velit dictum. Cras vulputate metus id felis ornare hendrerit. Maecenas sodales suscipit ipsum.')?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="about-slides owl-carousel mt-100 wow fadeInUp" data-wow-delay="600ms">
                        <img src="../img/bg-img/bg-3.jpg" alt="">
                        <img src="../img/bg-img/bg-2.jpg" alt="">
                        <img src="../img/bg-img/bg-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section class="teachers-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <h3><?= \Yii::t('yii', 'Meet the Teachers')?></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Teachers -->
               <?php
                    // $message = Message::find()->all();
                    $query = Teacher::find();            
                    $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4]);
                    $teacher = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                ?>
               <?php foreach($teacher as $tech):?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Thumbnail -->
                        <div style="background-image: url('../img/<?= $tech['img']?>');" class="teachers-thumbnail">
                            
                        </div>
                        <!-- Meta Info -->
                        <div class="teachers-info mt-30">
                            <h5><?= $tech['name']?></h5>
                            <span><?= $tech->getProfUz()?></span>
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
    </section>
    
</div>
