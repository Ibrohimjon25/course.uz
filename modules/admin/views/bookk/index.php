<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CategoryCourse;

/* @var $this yii\web\View */
/* @var $searchModel app\models\bookkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kitoblar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookk-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kitob Yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            // 'name_uz',   
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
            [
                'attribute'=>'avtor_uz',
                'value'=>function($data){
                    return $data->getAvtorUz();
                }
            ],
            'kitob',
            
            //'avtor_en',
            //'avtor_ru',
            [
                'attribute' => 'img',
                'format' => 'raw',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/img/'. $data['img'],
                        ['width' => '70px']);
                },
            ],
            //'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
