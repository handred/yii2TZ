<?php

use app\models\Polls;
use app\models\PollsSearch;
use app\models\Questions;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\View;

/** @var View $this */
/** @var PollsSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Опрос';
$this->params['breadcrumbs'][] = $this->title;

//  echo $dataProvider->query->createCommand()->rawSql;
?>
<div class="polls-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'tsCreate:date',
            [
                'label' => 'Дата',
                'value' => 'tsCreate',
                'format' => 'date',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'tsCreateString',
                    'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                ]),
            //'filtr' => DatePicker::widget(DatePicker::className(), ['language' => 'ru', 'dateFormat' => 'dd-MM-yyyy']),
            ],
            'phone',
            'email:email',
            'area',
            'city',
            [
                'attribute' => 'gender',
                'value' => 'genderText',
                'filter' => Polls::gender_options(),
            ],
            'questionId',
            'rating',
            [
                'attribute' => 'questionId',
                'value' => 'question',
                'filter' => Questions::options(),
            ],
            'comment:ntext',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Polls $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]);
    ?>
</div>
