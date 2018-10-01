<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Email: keccgroup@gmail.com
 * Date: 01.10.2018
 * Time: 17:37
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\states\models\States */

$this->title = Yii::t('app', 'Create States');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="states-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>