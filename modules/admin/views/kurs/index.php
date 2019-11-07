<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CategoryCourse;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KursSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kurs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kurs-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kurs Yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
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
            //'description_en',
            //'description_ru',
            //'date',
            [
                'attribute'=>'teacher_uz',
                'value'=>function($data){
                    return $data->getTeacherUz();
                }
            ],
            'fayl',
            //'teacher_ru',
            //'teacher_en',
            'points',
            // 'img',
            [
                'attribute' => 'img',
                'format' => 'raw',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/img/'. $data['img'],
                        ['width' => '70px']);
                },
            ],

            // 'category_id',
            [
                'attribute'=>'category_id',
                'value'=>function($data){
                    $cat = CategoryCourse::find()->where(['id'=>$data])->one();
                    return $cat->getNameUz();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
