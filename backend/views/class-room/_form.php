<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClassRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="class-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'class_room_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_room_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'class_room_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
