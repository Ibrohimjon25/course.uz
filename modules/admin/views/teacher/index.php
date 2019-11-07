<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'O`qtuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('O`qtuvchini Yaratmoq', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                'attribute'=>'profession_uz',
                'value'=>function($data){
                    return $data->getProfUz();
                }
            ],
            //'profession_ru',
            //'profession_en',
            // 'img',
            'points',
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
