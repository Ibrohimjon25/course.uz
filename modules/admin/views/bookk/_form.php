<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CategoryCourse;


/* @var $this yii\web\View */
/* @var $model app\models\bookk */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="margin-top: 50px" class="bookk-form container">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?php
        $languages = Yii::$app->params['languages'];
        $i = 0;
    ?>
    <ul class="nav nav-tabs">
        <?php foreach($languages as $language=>$label){ ?>
            <li class="nav-item"><a class="nav-link  <?= ($i==0)?'active':''?>" data-toggle="tab" href="#<?= $language?>"><?= $label?></a></li>  
        <?php $i++; }?>
    </ul>

    <div class="tab-content">
        <?php $j=0; foreach($languages as $language=>$label){ ?>
        <div id="<?= $language?>" class="tab-pane  in <?= ($i==0)?'active':'fade'?>">
            
            <?= $form->field($model, 'translate_name['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii', 'name_uz', null, $language)) ?>

            <?= $form->field($model, 'translate_description['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii', 'description_uz', null, $language)) ?>

            <?= $form->field($model, 'translate_avtor['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii', 'avtor_uz', null, $language)) ?>
        </div>
        <?php $j++; }?>
    </div>

    <?= $form->field($model, 'kitob')->fileInput() ?> 

    <?= $form->field($model, 'img')->fileInput() ?> 


        <?= $form->field($model, 'category_id')->dropDownList(
            ArrayHelper::map(CategoryCourse::find()->all(),'id','name_uz'),
            ['prompt'=>'Kategoriyani Tanlang']
        ) ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= $form->errorSummary($model) ?>
</div>
