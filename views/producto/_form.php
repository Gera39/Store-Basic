<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categorias;

/** @var yii\web\View $this */
/** @var app\models\Producto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'categoria_id')->dropDownList($categorias, ['prompt' => 'Seleccione una categoría'])->label('Categoria')?>

    <?= $form->field($model, 'precio') ?>

    <?= $form->field($model, 'descripcion') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
