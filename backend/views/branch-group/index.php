<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use kartik\daterange\DateRangePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['program_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-group-index">

  <!-- <h1><?= Html::encode($this->title) ?></h1> -->
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่มวิชาเรียน', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pager' => [
      'firstPageLabel' => 'First',
      'lastPageLabel' => 'Last',
    ],
    'showOnEmpty'=>true,
    'panel'=>['type'=>'primary', 'heading'=>'ตั้งค่าวิชาเรียน'],
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

      //'branch_group_id',
      'branch_group_name',
      'branch_group_detail:ntext',
      [
        'attribute'=>'branch_group_status',
        'filter'=> Html::activeDropDownList($searchModel, 'branch_group_status', ['0'=>'เปิดใช้งาน','1'=>'ปิดใช้งาน'], ['class'=>'form-control','prompt' => 'เลือก']),
        'format'=>'html',
        'value'=> function($model){
          if ($model->branch_group_status==0) {
            $status = '<span class="label label-success">เปิดใช้งาน</span>';
          }else{
            $status = '<span class="label label-danger">ปิดใช้งาน</span>';
          }
          return $status;
        }
      ],
      //['class' => 'yii\grid\ActionColumn'],
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
            Html::a('<span class="glyphicon glyphicon-pencil"></span>',['update','id'=>$model->branch_group_id],['class'=>'btn btn-warning']);
          },
          'delete' => function ($url,$model){
            return
            Html::a('<span class="glyphicon glyphicon-trash"></span>',['delete','id'=>$model->branch_group_id],['class'=>'btn btn-danger',
            'data-confirm'=>'คุณต้องการลบข้อมูลหรือไม่ ?',
          ]);
        },

      ],
    ],
  ],
]); ?>
</div>
