<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Polls $model */

$this->title = 'Create Polls';
$this->params['breadcrumbs'][] = ['label' => 'Polls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polls-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
