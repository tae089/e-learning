<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VideoGroup */

$this->title = 'Update Video Group: ' . $model->video_group_id;
$this->params['breadcrumbs'][] = ['label' => 'Video Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->video_group_id, 'url' => ['view', 'id' => $model->video_group_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="video-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
