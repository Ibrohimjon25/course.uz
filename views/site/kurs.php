<?php
    use app\models\Kurs;
    use app\models\CategoryCourse;
    use yii\helpers\Html;
?>
    <div class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <?php 
                $title = CategoryCourse::find()->where(['id'=>$model[0]['category_id']])->one();
            ?>
            <h2><?= $title->getNameUz() ?></h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area mt-50 section-padding-100-70">
        <div class="container">
            <div class="row">
               
                <!-- Single Top Popular Course -->
                <?php
                    // $m = filesize('web/fayl/'.$model[0]['fayl']);
                $m = Yii::getAlias('@webroot').'/fayl/'.$model[0]['fayl'];
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
                
            </div>
        </div>
    </div>
    