<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BranchGroup */

$this->title = $model->branch_group_id;
$this->params['breadcrumbs'][] = ['label' => 'Branch Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->branch_group_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->branch_group_id], [
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
            'branch_group_id',
            'branch_group_name',
            'branch_group_detail:ntext',
            'branch_group_status',
        ],
    ]) ?>

</div>
