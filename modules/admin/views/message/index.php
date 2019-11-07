<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xabarlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Xabar Yaratish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            // 'name_uz',
            //'name_en',
            //'name_ru',
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
            [
                'attribute'=>'title_uz',
                'value'=>function($data){
                    return $data->getTitleUz();
                }
            ],
            'email:email',
            // 'description_uz',
            'title_uz',
            //'description_en',
            //'description_ru',
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
