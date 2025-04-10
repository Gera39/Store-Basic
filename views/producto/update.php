<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Producto $model */

$this->title = 'Update Producto: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', '_id' => (string) $model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="producto-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nombre') ?>

        <?= $form->field($model, 'categoria_id')->dropDownList($categorias, ['prompt' => 'Seleccione una categoría'])->label('Categoria') ?>

        <?= $form->field($model, 'precio') ?>

        <?= $form->field($model, 'descripcion') ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>