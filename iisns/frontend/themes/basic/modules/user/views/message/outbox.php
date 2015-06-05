<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
$this->params['count'] = $count;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'showHeader' => false,
    'columns' => [
        'subject',
        'content',
        'created_at'

        // [
        //     'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
        //     'value' => function ($data) {
        //         return $data->name; // $data['name'] for array data, e.g. using SqlDataProvider.
        //     },
        // ],
    ],
]);?>