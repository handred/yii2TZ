<?php

use app\models\Questions;
use yii\bootstrap5\ActiveForm as ActiveForm2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;


/** @var View $this */
/** @var Questions $model */
/** @var ActiveForm $form */
?>

<div class="questions-form">

    <?php $form = ActiveForm2::begin(); ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm2::end(); ?>

</div>
