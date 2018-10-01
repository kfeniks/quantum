<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\investment\models\Investment */

$this->title = Yii::t('app', 'Create Investment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Investments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
