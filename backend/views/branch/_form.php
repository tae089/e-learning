<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\BranchGroup;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Branch */
/* @var $form yii\widgets\ActiveForm */
$barnch_group = BranchGroup::find()->all();
$listData=ArrayHelper::map($barnch_group,'branch_group_id','branch_group_name');
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'branch_group_id')->dropDownlist($listData,['prompt'=>'เลือก']) ?>

    <?= $form->field($model, 'branch_order')->textInput() ?>

    <?= $form->field($model, 'branch_imges')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
