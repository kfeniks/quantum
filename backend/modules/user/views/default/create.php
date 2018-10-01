<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserEdit */

$this->title = Yii::t('app', 'Create User Edit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Edits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-edit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>