<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Operators */

$this->title = Yii::t('app', 'Create Operators');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operators-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
