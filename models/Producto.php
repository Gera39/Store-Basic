<?php

namespace app\models;

use yii\mongodb\ActiveRecord;

class Producto extends ActiveRecord
{
    /**
     * Define el nombre de la colección y la base de datos.
     * Ajusta 'tu_basedatos' al nombre real de tu base de datos.
     */
    public static function collectionName()
    {
        return ['servicio', 'producto'];
    }

    /**
     * Lista de atributos de la colección.
     */
    public function attributes()
    {
        return [
            '_id',          // MongoDB asigna automáticamente un _id
            'nombre',       // Nombre del producto
            'precio',       // Precio del producto
            'categoria_id', // Referencia a la categoría
            'descripcion',  // Descripción del producto
        ];
    }

    /**
     * Reglas de validación.
     */
    public function rules()
    {
        return [
            [['nombre', 'categoria_id', 'precio'], 'required'],
            [['precio'], 'number'],
            [['descripcion'], 'string'],
        ];
    }

    public function getCategoria()
    {
        return $this->hasOne(Categorias::class,['_id' => 'categoria_id']);
    }
}
