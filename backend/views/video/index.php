<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use kartik\daterange\DateRangePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['program_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่มวีดีโอ', ['video-group/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่มหมวดหมู่วีดีโอ', ['create'], ['class' => 'btn btn-success']) ?>
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
            'video_name',
            'video_detail:ntext',
            'video_group_id',
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
                  Html::a('<span class="glyphicon glyphicon-pencil"></span>',['update','id'=>$model->video_id],['class'=>'btn btn-warning']);
                },
                'delete' => function ($url,$model){
                  return
                  Html::a('<span class="glyphicon glyphicon-trash"></span>',['delete','id'=>$model->video_id],['class'=>'btn btn-danger',
                  'data-confirm'=>'คุณต้องการลบข้อมูลหรือไม่ ?',
                ]);
              },

            ],
          ],
        ],
    ]); ?>
</div>
