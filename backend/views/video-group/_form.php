<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VideoGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_group_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_group_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'video_group_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
