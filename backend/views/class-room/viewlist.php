<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ClassRoom */

$this->title = $model->class_room_id;
$this->params['breadcrumbs'][] = ['label' => 'Class Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-room-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <!-- <p>
  <?= Html::a('Update', ['update', 'id' => $model->class_room_id], ['class' => 'btn btn-primary']) ?>
  <?= Html::a('Delete', ['delete', 'id' => $model->class_room_id], [
  'class' => 'btn btn-danger',
  'data' => [
  'confirm' => 'Are you sure you want to delete this item?',
  'method' => 'post',
],
]) ?>
</p> -->

<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-institution"></i>  รายการห้องเรียน</h3>

      <div class="box-tools">
        <div style="width: 150px;" class="input-group input-group-sm">
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>#</th>
            <th>รายการ</th>
            <th><center>จัดการ</center></th>
          </tr>
          <?php
          //var_dump($model);
          foreach ($model as $key => $value) {
            if ($value->class_room_status==0) {
              ?>
              <tr>
                <td><?=$key+1 ?></td>
                <td><i class="fa fa-graduation-cap"></i> <?=$value->class_room_name; ?></td>
                <td>
                  <center>
                    <?= Html::a('<i class="fa fa-plus-circle"></i> จัดการเนื้อหา', ['update', 'id' => $value->class_room_id], ['class' => 'btn btn-primary']) ?>
                  </center>
                  </td>
              </tr>
              <?php
            }
          }
          ?>

        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

</div>
