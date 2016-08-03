<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BranchGroup */

$this->title = 'Update Branch Group: ' . $model->branch_group_id;
$this->params['breadcrumbs'][] = ['label' => 'Branch Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->branch_group_id, 'url' => ['view', 'id' => $model->branch_group_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branch-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
