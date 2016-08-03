<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BranchGroup */

$this->title = 'Create Branch Group';
$this->params['breadcrumbs'][] = ['label' => 'Branch Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
