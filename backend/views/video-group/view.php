<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\VideoGroup */

$this->title = $model->video_group_id;
$this->params['breadcrumbs'][] = ['label' => 'Video Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->video_group_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->video_group_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'video_group_id',
            'video_group_name',
            'video_group_detail:ntext',
            'video_group_status',
        ],
    ]) ?>

</div>
