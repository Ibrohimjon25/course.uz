<?php
use app\models\CategoryCourse;
use app\models\Message;
use app\models\Kurs;
use yii\data\Pagination;
use yii\widgets\Pjax;
use yii\helpers\Url;
?>
<!-- ##### Course Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2><?= Yii::t('yii', 'Our Courses')?></h2>
        </div>
    </div>
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <h3><?= Yii::t('yii', 'Our Courses')?></h3>
                    </div>
                </div>
            <div class="row">
                <!-- Single Course Area -->
                 <div class="row">
                <!-- Single Course Area -->
                <?php
                // $category = CategoryCourse::find()->all();
                $query = CategoryCourse::find();
                // $pages = new Pagination(['defaultPageSize'=>3,'totalCount' => $query->count()]);
                
                $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12]);
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
                            <a style="text-decoration: none; color: #79C143" href="<?= Url::to(['site/kurs', 'id'=>$cat['id']])?>"><h4><?= $cat->getNameUz()?></h4></a>
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
    </div>
    <!-- ##### Course Area End ##### -->