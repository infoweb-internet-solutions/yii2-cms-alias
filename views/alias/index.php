<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AliasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('infoweb/alias', 'Aliases');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php // Flash message ?>
    <?php if (Yii::$app->getSession()->hasFlash('alias')): ?>
    <div class="alert alert-success">
        <p><?= Yii::$app->getSession()->getFlash('alias') ?></p>
    </div>
    <?php endif; ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
            'modelClass' => Yii::t('infoweb/alias', 'Alias'),
        ]), ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?php Pjax::begin([
        'id'=>'grid-pjax'
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\DataColumn',
                'label' => Yii::t('app', 'Entity'),
                'value' => 'entityTypeName'
            ],
            [
                'class' => 'kartik\grid\DataColumn',
                'label' => Yii::t('app', 'Name'),
                'attribute' => 'entityModel.name',
                'value' => 'entityModel.name',
                'enableSorting' => true
            ],
            [
                'class' => 'kartik\grid\DataColumn',
                'label' => Yii::t('app', 'Url'),
                'value' => function($data) {
                    return '/'.Yii::$app->language.'/'.$data->url;
                },
                'enableSorting' => true
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{update}',
                'updateOptions'=>['title' => 'Update', 'data-toggle' => 'tooltip'],
                'width' => '100px',
            ],
        ],
        'responsive' => true,
        'floatHeader' => true,
        'floatHeaderOptions' => ['scrollingTop' => 88],
        'hover' => true,
    ]); ?>

</div>
