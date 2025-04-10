<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Categorias $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categorias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', '_id' => (string) $model->_id], ['class' => 'btn btn-primary']) ?>
        <?php if($model->productos == null):?>
            <?= Html::a('Delete', ['delete', '_id' => (string) $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
            <?php endif;?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'nombre',
            'descripcion',
            [
                'label' => 'Productos',
                'format' => 'raw',
                'value' => function ($model) {
                    return GridView::widget([
                        'dataProvider' => new \yii\data\ArrayDataProvider([
                            'allModels' => $model->productos,
                            'pagination' => false,
                        ]),
                        'summary' => false,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nombre',
                            'precio',
                            [
                                'label' => 'Acciones',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::a('Ver', ['producto/view', '_id' => (string) $model->_id], ['class' => 'btn btn-primary m-2']).
                                            Html::a('Actualizar', ['producto/update', '_id' => (string) $model->_id], ['class' => 'btn btn-success']);
                                },
                            ],
                        ],
                    ]);
                    // $rows = '';
                    // foreach ($model->productos as $producto) {
                    //     $rows .= '<tr><td>' . Html::encode($producto->nombre) . '</td><td>' . Html::encode($producto->precio) . '</td></tr>';
                    // }
                    // return '<table class="table table-bordered"><thead><tr><th>Nombre</th><th>Precio</th></tr></thead><tbody>' . $rows . '</tbody></table>';
                }
            ],
        ],
    ]) ?>

</div>
