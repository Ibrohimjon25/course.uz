<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\CategoryCourse;

/* @var $this yii\web\View */
/* @var $model app\models\Pictures */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pictures-form container">

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
        </div>
        <?php $j++; }?>
    </div>


      <?php
        echo $form->field($model, 'date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Tanlang'],
            'removeButton' => false,
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                //'startView'=>'century',
                //'minViewMode'=>'months',
            ]
        ]);
        ?>

    <?= $form->field($model, 'file')->fileInput() ?>    

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
