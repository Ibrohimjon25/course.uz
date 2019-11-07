<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryCourse */

$this->title = 'Kategoriya Kurslarini Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Kategoriya Kurslari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-course-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
