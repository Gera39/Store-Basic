<?php

namespace app\models;

use yii\mongodb\ActiveRecord;

class Categorias extends ActiveRecord
{
    /**
     * Define el nombre de la colección y la base de datos.
     */
    public static function collectionName()
    {
        return ['servicio', 'categorias'];
    }

    /**
     * Lista de atributos de la colección.
     */
    public function attributes()
    {
        return [
            '_id',         // MongoDB asigna automáticamente un _id
            'nombre',      // Nombre de la categoría
            'descripcion', // Descripción de la categoría
        ];
    }

    /**
     * Reglas de validación.
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
        ];
    }

    public function getProductos()
    {
        return $this->hasMany(Producto::class, ['categoria_id' => '_id']);
    }
}
