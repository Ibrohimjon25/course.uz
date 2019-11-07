<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KursSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kurs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_uz') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'description_ru') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'teacher_uz') ?>

    <?php // echo $form->field($model, 'teacher_ru') ?>

    <?php // echo $form->field($model, 'teacher_en') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
