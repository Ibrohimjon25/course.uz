<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('User hosil qilish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',
            // 'authKey',
            // 'accessToken',
            'password',
            'status',
            
            'email:email',
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
