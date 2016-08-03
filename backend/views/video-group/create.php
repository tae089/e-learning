<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\VideoGroup */

$this->title = 'Create Video Group';
$this->params['breadcrumbs'][] = ['label' => 'Video Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
