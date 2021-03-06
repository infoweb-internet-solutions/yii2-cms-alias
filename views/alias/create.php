<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alias */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => Yii::t('infoweb/alias', 'Alias'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('infoweb/alias', 'Aliases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'entities' => $entities
    ]) ?>

</div>