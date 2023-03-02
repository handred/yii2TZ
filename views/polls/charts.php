<?php

use app\models\PollsSearch;
use miloschuman\highcharts\Highcharts;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\View;

/** @var View $this */
/** @var PollsSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Графики';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="polls-charts">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $chartDataArea = $searchModel
            ->search()
            ->query
            ->select(['avg(rating)', 'area'])
            ->groupBy(['area'])
            ->indexBy('area')
            ->column();

    echo Highcharts::widget([
        'options' => [
            'chart' => ['type' => 'column'],
            'title' => ['text' => 'Средняя оценка'],
            'xAxis' => [
                'categories' => array_keys($chartDataArea)
            ],
            'yAxis' => [
                'title' => ['text' => 'Оценка']
            ],
            'series' => [
                ['name' => 'По районам', 'data' => array_values(array_map(function ($rating) {
                                return (int) $rating;
                            }, $chartDataArea))],
            ]
        ]
    ]);

    $chartDataCity = $searchModel
            ->search()
            ->query
            ->select(['avg(rating)', 'city'])
            ->groupBy(['city'])
            ->indexBy('city')
            ->column();

    echo Highcharts::widget([
        'options' => [
            'chart' => ['type' => 'column'],
            'title' => ['text' => 'Средняя оценка'],
            'xAxis' => [
                'categories' => array_keys($chartDataCity)
            ],
            'yAxis' => [
                'title' => ['text' => 'Оценка']
            ],
            'series' => [
                ['name' => 'По городам', 'data' => array_values(array_map(function ($rating) {
                                return (int) $rating;
                            }, $chartDataCity))],
            ]
        ]
    ]);

    $chartDataGender = $searchModel
            ->search()
            ->query
            ->select(['avg(rating)', 'gender'])
            ->groupBy(['gender'])
            ->indexBy('gender')
            ->column();

    echo Highcharts::widget([
        'options' => [
            'chart' => ['type' => 'bar'],
            'title' => ['text' => 'Средняя оценка'],
            'type' => 'bar',
            'xAxis' => [
                'categories' => array_keys($chartDataGender)
            ],
            'yAxis' => [
                'title' => ['text' => 'Оценка']
            ],
            'series' => [
                ['name' => 'По полу', 'data' => array_values(array_map(function ($rating) {
                                return (int) $rating;
                            }, $chartDataGender))],
            ]
        ]
    ]);

    $chartDataDate = $searchModel
            ->search()
            ->query
            ->select(['avg(rating)', 'date'])
            ->groupBy(['date'])
            ->indexBy('date')
            ->column();

    echo Highcharts::widget([
        'options' => [
            'chart' => ['type' => 'line'],
            'title' => ['text' => 'Средняя оценка'],
            'type' => 'bar',
            'xAxis' => [
                'categories' => array_keys($chartDataDate)
            ],
            'yAxis' => [
                'title' => ['text' => 'Оценка']
            ],
            'series' => [
                ['name' => 'По дате', 'data' => array_values(array_map(function ($rating) {
                                return (int) $rating;
                            }, $chartDataDate))],
            ]
        ]
    ]);
    ?>
</div>
