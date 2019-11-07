<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoryCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kurs Kategoriyasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-course-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kurs Kategoriyasini Yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'name_uz',
                'value'=>function($data){
                    return $data->getNameUz();
                }
            ],
           // 'name_ru',
            //'name_en',
            // 'description_uz',
            [
                'attribute'=>'description_uz',
                'value'=>function($data){
                    return $data->getDescriptionUz();
                }
            ],
            //'description_ru',
            //'description_en',
            // 'img',
            [
                'attribute' => 'img',
                'format' => 'raw',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/img/'. $data['img'],
                        ['width' => '70px']);
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
            ]); ?>


</div>
