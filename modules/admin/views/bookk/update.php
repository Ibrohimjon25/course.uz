<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\bookk */

$this->title = $model->getNameUz();
$this->params['breadcrumbs'][] = ['label' => 'bookks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="bookk-update container">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
