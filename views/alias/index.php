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

    <?php // Title ?>
    <h1>
        <?= Html::encode($this->title) ?>
        <?php // Buttons ?>
        <div class="pull-right">
            <?= Html::a(Yii::t('app', 'Create {modelClass}', [
                'modelClass' => Yii::t('infoweb/alias', 'Alias'),
            ]), ['create'], ['class' => 'btn btn-success']); ?>    
        </div>
    </h1>
    
    <?php // Flash messages ?>
    <?php echo $this->render('_flash_messages'); ?>

    <?php // Gridview ?>
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
                'updateOptions' => ['title' => Yii::t('app', 'Update'), 'data-toggle' => 'tooltip'],
                'width' => '100px',
            ],
        ],
        'responsive' => true,
        'floatHeader' => true,
        'floatHeaderOptions' => ['scrollingTop' => 88],
        'hover' => true,
        'export' => false,
    ]); ?>

</div>
