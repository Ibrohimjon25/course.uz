<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\bookk */

$this->title = 'Kitob Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Bookks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookk-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
