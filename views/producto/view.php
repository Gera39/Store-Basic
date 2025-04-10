<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Producto $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', '_id' => (string) $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', '_id' => (string) $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'nombre',
            [
                'label' => 'Categoria',
                'value' => function ($model) {
                    return '<a class="btn btn-success" href="' . \yii\helpers\Url::to(['categorias/view', '_id' => (string) $model->categoria_id]) . '">' . $model->categoria->nombre . '</a>';
                },
                'format' => 'raw',
                'contentOptions' => ['style' => 'width: 200px;'],
            ],
            'precio',
            'descripcion',
        ],
    ]) ?>

</div>
