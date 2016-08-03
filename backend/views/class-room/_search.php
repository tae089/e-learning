<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClassRoomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="class-room-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'class_room_id') ?>

    <?= $form->field($model, 'class_room_name') ?>

    <?= $form->field($model, 'class_room_detail') ?>


    <?php // echo $form->field($model, 'class_room_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
