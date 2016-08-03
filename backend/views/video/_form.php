<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use backend\models\VideoGroup;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Video */
/* @var $form yii\widgets\ActiveForm */
$video_group = VideoGroup::find()->all();
$listData=ArrayHelper::map($video_group,'video_group_id','video_group_name');

$title_name = (isset($_GET['id'])) ? '<i class="fa fa-edit"></i> แก้ไขวีดีโอ' : '<i class="fa fa-plus-circle"></i> บันทึกวีดีโอ' ;
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?=$title_name ?></h3>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="video-form">

          <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

          <?= $form->field($model, 'video_name')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'video_detail')->textarea(['rows' => 6]) ?>

          <?= $form->field($model, 'video_group_id')->dropDownlist($listData,['prompt' =>'เลือก']) ?>

          <?= $form->field($model, 'video_order')->textInput() ?>
          <div class="form-group">
            <?php

            if (!empty($model->video_image)) {
              $title = isset($model->video_image) && !empty($model->video_image) ? $model->video_image : 'Avatar';
              echo Html::img($model->getImageUrl(), [
                'class'=>'img-thumbnail',
                'alt'=>$title,
                'title'=>$title,
                'style'=>'width:170px'
              ]);
              echo "<br>";
              echo Html::a('<i class="fa fa-trash-o"></i> ลบ', ['/person/delete', 'id'=>$model->video_id], ['class'=>'btn btn-danger','style'=>'width:172px']);
            }
            ?>
          </div>
          <?php

          if (empty($model->video_image)) {
            echo $form->field($model, 'video_image')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*'],
              'pluginOptions' => ['allowedFileExtensions'=>['jpg','gif','png']],
            ]);
          }

          ?>

          <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันททึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          </div>

          <?php ActiveForm::end(); ?>

        </div>

      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
