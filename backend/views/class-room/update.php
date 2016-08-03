<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClassRoom */

$this->title = 'Update Class Room: ' . $model->class_room_id;
$this->params['breadcrumbs'][] = ['label' => 'Class Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->class_room_id, 'url' => ['view', 'id' => $model->class_room_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="class-room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
