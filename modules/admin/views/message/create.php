<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = 'Xabar Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Xabarlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
