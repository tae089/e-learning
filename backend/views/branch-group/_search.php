<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BranchGroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'branch_group_id') ?>

    <?= $form->field($model, 'branch_group_name') ?>

    <?= $form->field($model, 'branch_group_detail') ?>

    <?= $form->field($model, 'branch_group_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
