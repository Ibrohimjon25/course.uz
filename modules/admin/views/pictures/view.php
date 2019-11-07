<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pictures */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pictures-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

     <?php
        $languages = Yii::$app->params['languages'];
    ?>
    <div class="tab-content">
        
        <?php foreach($languages as $language=>$label){ ?>
        <table class="table table-bordered table-striped detail-view">
        <div id="<?= $language?>" class="tab-pane ">
            
                <tr>
                    <th class="width: 20%"><?= Yii::t('yii', 'name_uz', null, $language)?></th>
                    <td><?= $model->getNameUz($language)?></td>
                </tr>
            
        </div>
        </table>
        <?php }?>
        
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'name_uz',
            'date',
            [
                'attribute' => 'img',
                'format' => 'raw',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/img/'. $data['img'],
                        ['width' => '70px']);
                },
            ],
        ],
    ]) ?>

</div>
