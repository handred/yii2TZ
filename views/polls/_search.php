<?php

use app\models\Polls;
use app\models\PollsSearch;
use app\models\Questions;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\View;

/** @var View $this */
/** @var PollsSearch $model */
/** @var ActiveForm $form */
?>

<div class="polls-search">

    <?php
    $form = ActiveForm::begin([
                //'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <div class="row">
        <div class="col-md-2">
            <?=
            $form->field($model, 'tsCreateString')->widget(DatePicker::className(), [
                'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control text-center'],
                'clientOptions' => [
                    'defaultDate' => date('Y-m-d'),
                ],
            ])
            ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div class="col-md-1">

            <?= $form->field($model, 'email')->textInput() ?>
        </div>

        <div class="col-md-1">

            <?= $form->field($model, 'area')->textInput() ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'city')->textInput() ?>
        </div>

        <div class="col-md-1">
            <?= $form->field($model, 'gender')->dropDownList([null => 'Выбрать'] + Polls::gender_options()) ?>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label class="form-label">&nbsp;</label>
                <?= Html::submitButton('Найти', ['class' => 'btn btn-primary form-control']) ?>
            </div>
        </div>

        <div class="col-md-1">
            <div class="form-group">
                <label class="form-label">&nbsp; </label>
                <?= Html::resetButton('Очистить', ['class' => 'btn btn-outline-secondary']) ?>
            </div>

        </div>

    </div>












    <?php ActiveForm::end(); ?>

</div>
