<?php

/*
* This file is part of the Dektrium project.
*
* (c) Dektrium project <http://github.com/dektrium>
*
* For the full copyright and license information, please view the LICENSE.md
* file that was distributed with this source code.
*/

use dektrium\user\models\UserSearch;
use yii\data\ActiveDataProvider;
//use yii\grid\GridView;
use \kartik\grid\GridView;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\View;
use yii\widgets\Pjax;

/**
* @var View $this
* @var ActiveDataProvider $dataProvider
* @var UserSearch $searchModel
*/

$this->title = Yii::t('user', 'Manage users');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', [
  'module' => Yii::$app->getModule('user'),
  ]) ?>

  <?= $this->render('/admin/_menu') ?>

  <?php Pjax::begin() ?>

  <?= GridView::widget([
    'dataProvider' 	=> $dataProvider,
    'filterModel'  	=> $searchModel,
    'layout'  		=> "{items}\n{pager}",
    'pager' => [
      'firstPageLabel' => 'First',
      'lastPageLabel' => 'Last',
    ],
    'showOnEmpty'=>true,
    'panel'=>['type'=>'primary', 'heading'=>'จัดการผู้ใช้'],
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
      'username',
      'email:email',
      [
        'attribute'=> 'level_login',
        'value'=> function($model){

          if($model->level_login==1){
            $dat='1.ระบบสมาชิก';
          }elseif($model->level_login==2){
            $dat='2.ระบบจัดทำบัตรสมาชิก';
          }elseif ($model->level_login==3) {
            $dat='3.ระบบ Stock ส่วนกลาง';
          }elseif ($model->level_login==4) {
            $dat='4.ระบบจัดการวัตถุดิบคงคลัง';
          }elseif ($model->level_login==5) {
            $dat='5.ระบบจัดทำโปรโมชั่น';
          }elseif ($model->level_login==6) {
            $dat='6.ระบบจัดการชิงโชค';
          }elseif ($model->level_login==7) {
            $dat='7.ระบบจัดการส่วนกลาง';
          }elseif ($model->level_login==8) {
            $dat='8.ระบบ E-Commerce';
          }elseif ($model->level_login==9) {
            $dat='9.ระบบตัวแทนจำหน่าย';
          }elseif ($model->level_login==99) {
            $dat='99.ผู้ดูแลระบบ';
          }elseif ($model->level_login==10) {
            $dat='10.ระบบจัดการสั่งซื้อสินค้า';
          }elseif ($model->level_login==11) {
            $dat='11.ระบบจัดการ Packing';
          }elseif ($model->level_login==12) {
            $dat='12.ระบบจัดการบัญชี';
          }else{
            $dat="";
          }

          return $dat;
        }

      ],
      'agent_code',
      'agent_name',
      /*        [
      'attribute' => 'registration_ip',
      'value' => function ($model) {
      return $model->registration_ip == null
      ? '<span class="not-set">' . Yii::t('user', '(not set)') . '</span>'
      : $model->registration_ip;
    },
    'format' => 'html',
  ],*/
  /*        [
  'attribute' => 'created_at',
  'value' => function ($model) {
  if (extension_loaded('intl')) {
  return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
} else {
return date('Y-m-d G:i:s', $model->created_at);
}
},
'filter' => DatePicker::widget([
'model'      => $searchModel,
'attribute'  => 'created_at',
'dateFormat' => 'php:Y-m-d',
'options' => [
'class' => 'form-control',
],
]),
],*/
/*        [
'header' => Yii::t('user', 'Confirmation'),
'value' => function ($model) {
if ($model->isConfirmed) {
return '<div class="text-center"><span class="text-success">' . Yii::t('user', 'Confirmed') . '</span></div>';
} else {
return Html::a(Yii::t('user', 'Confirm'), ['confirm', 'id' => $model->id], [
'class' => 'btn btn-xs btn-success btn-block',
'data-method' => 'post',
'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
]);
}
},
'format' => 'raw',
'visible' => Yii::$app->getModule('user')->enableConfirmation,
],*/
[
  'header' => Yii::t('user', 'Block status'),
  'value' => function ($model) {
    if ($model->isBlocked) {
      return Html::a(Yii::t('user', 'Unblock'), ['block', 'id' => $model->id], [
        'class' => 'btn btn-xs btn-success btn-block',
        'data-method' => 'post',
        'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?'),
      ]);
    } else {
      return Html::a(Yii::t('user', 'Block'), ['block', 'id' => $model->id], [
        'class' => 'btn btn-xs btn-danger btn-block',
        'data-method' => 'post',
        'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?'),
      ]);
    }
  },
  'format' => 'raw',
],
[
  'class' => 'yii\grid\ActionColumn',
  'template' => '{update}',
],
],
]); ?>

<?php Pjax::end() ?>
