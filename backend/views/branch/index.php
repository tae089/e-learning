<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\FormulaColumn;
//use kartik\daterange\DateRangePicker;
use yii\widgets\Pjax;
use backend\models\BranchGroup;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['program_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-index">

  <!-- <h1><?= Html::encode($this->title) ?></h1> -->
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่มวิชาเรียน', ['branch-group/create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่วิชาเรียน', ['create'], ['class' => 'btn btn-success']) ?>
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

      //'branch_id',
      [
        'attribute'=>'branch_group_id',
        'value'=> function($model){
          $data_list = BranchGroup::find()->where(['branch_group_id'=>$model->branch_group_id])->all();
          return $data_list[0]['branch_group_name'];
        },
        'group'=>true,
      ],
      'branch_name',
      'branch_detail:ntext',
      'branch_order',
      'branch_imges',

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
