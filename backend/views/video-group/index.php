<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use kartik\daterange\DateRangePicker;
use yii\widgets\Pjax;
use kartik\grid\FormulaColumn;
use backend\models\VideoGroup;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VideoGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['program_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-md-12">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#tab_1" aria-expanded="false">วีดีโอ</a></li>
      <li class=""><a data-toggle="tab" href="#tab_2" aria-expanded="false">หวมดหมู่วีดีโอ</a></li>
      <li class="pull-right"><a class="text-muted" href="#"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
      <div id="tab_1" class="tab-pane active">
        <div class="video-group-index">

          <!-- <h1><?= Html::encode($this->title) ?></h1> -->
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
            <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่มวีดีโอ', ['create'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
            'dataProvider' => $dataProviderGroup,
            'filterModel' => $searchModelGroup,
            'pager' => [
              'firstPageLabel' => 'First',
              'lastPageLabel' => 'Last',
            ],
            'showOnEmpty'=>true,
            'panel'=>['type'=>'primary', 'heading'=>'ตั้งค่าหมวดหมู่วีดีโอ'],
            'responsive'=>true,
            'hover'=>true,
            'pjax'=>true,
            // 'showPageSummary' => true,
            'export' => [
              'label' => 'Export',
              'fontAwesome' => true,

            ],
            'exportConfig' => [
              \kartik\grid\GridView::EXCEL => [
                'fontAwesome' => true,
                'label' => 'Export to Excel',
                'icon' => 'file-excel-o',
              ],
            ],

            'columns' => [
              [

                'class' => 'kartik\grid\SerialColumn'
              ],

              //'video_group_id',
              'video_group_name',
              'video_group_detail:ntext',
              [
                'attribute'=>'video_group_status',
                'filter'=> Html::activeDropDownList($searchModelGroup, 'video_group_status', ['0'=>'เปิดใช้งาน','1'=>'ปิดใช้งาน'], ['class'=>'form-control','prompt' => 'เลือก']),
                'format'=>'html',
                'value'=> function($model){
                  if ($model->video_group_status==0) {
                    $status = '<span class="label label-success">เปิดใช้งาน</span>';
                  }else{
                    $status = '<span class="label label-danger">ปิดใช้งาน</span>';
                  }
                  return $status;
                }
              ],

              [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-default'],
                'header' => '<font size=2>จัดการ</font>',
                'headerOptions' => ['class' => 'text-center skip-export'],
                'contentOptions' => ['class' => 'text-center skip-export','noWrap' => true],
                'template'=> '{update} {delete}',
                'buttons' => [
                  'update' => function ($url,$model){
                    return
                    Html::a('<span class="glyphicon glyphicon-pencil"></span>',['video-group/update','id'=>$model->video_group_id],['class'=>'btn btn-warning']);
                  },
                  'delete' => function ($url,$model){
                    return
                    Html::a('<span class="glyphicon glyphicon-trash"></span>',['video-group/delete','id'=>$model->video_group_id],['class'=>'btn btn-danger',
                    'data-confirm'=>'คุณต้องการลบข้อมูลหรือไม่ ?',
                  ]);
                },

              ],
            ],
          ],
        ]); ?>
        </div>
      </div>
      <!-- /.tab-pane -->
      <div id="tab_2" class="tab-pane">
        <div class="video-index">
          <!-- <h1><?= Html::encode($this->title) ?></h1> -->
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
            <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่วีดีโอ', ['video/create'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pager' => [
              'firstPageLabel' => 'First',
              'lastPageLabel' => 'Last',
            ],
            'showOnEmpty'=>true,
            'panel'=>['type'=>'primary', 'heading'=>'ตั้งค่าหมวดหมู่วีดีโอ'],
            'responsive'=>true,
            'hover'=>true,
            'pjax'=>true,
            // 'showPageSummary' => true,
            'export' => [
              'label' => 'Export',
              'fontAwesome' => true,

            ],
            'exportConfig' => [
              \kartik\grid\GridView::EXCEL => [
                'fontAwesome' => true,
                'label' => 'Export to Excel',
                'icon' => 'file-excel-o',
              ],
            ],

            'columns' => [
              [

                'class' => 'kartik\grid\SerialColumn'
              ],

              //'video_id',
              [
                'attribute'=>'video_group_id',
                'value'=> function($model){
                  $data_list = VideoGroup::find()->where(['video_group_id'=>$model->video_group_id])->all();
                  return $data_list[0]['video_group_name'];
                },
                'group'=>true,
              ],
              'video_name',
              'video_detail:ntext',
              'video_order',
              'video_image',

              [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-default'],
                'header' => '<font size=2>จัดการ</font>',
                'headerOptions' => ['class' => 'text-center skip-export'],
                'contentOptions' => ['class' => 'text-center skip-export','noWrap' => true],
                'template'=> '{update} {delete}',
                'buttons' => [
                  'update' => function ($url,$model){
                    return
                    Html::a('<span class="glyphicon glyphicon-pencil"></span>',['video/update','id'=>$model->video_id],['class'=>'btn btn-warning']);
                  },
                  'delete' => function ($url,$model){
                    return
                    Html::a('<span class="glyphicon glyphicon-trash"></span>',['video/delete','id'=>$model->video_id],['class'=>'btn btn-danger',
                    'data-confirm'=>'คุณต้องการลบข้อมูลหรือไม่ ?',
                  ]);
                },

              ],
            ],
          ],
        ]); ?>
      </div>

    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
</div>
</div>
