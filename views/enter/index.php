<?php

use app\models\Polls;
use app\models\Questions;
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap5\ActiveForm;

/** @var View $this */
/** @var Polls $model */
/** @var ActiveForm $form */
$this->title = 'Анкета';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="polls-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'gender')->dropDownList([null => 'Выбрать'] + Polls::gender_options()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'questionId')->dropDownList(Questions::options()) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'rating')
            ->inline(true)
            ->radioList(Polls::rating_options()) ?>
        </div>
    </div>


    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
