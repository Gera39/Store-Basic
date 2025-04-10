<?php
// db.php - Configuración de conexión a MongoDB para Yii2

return [
    'class' => '\yii\mongodb\Connection',
    // Reemplaza 'usuario', 'contraseña' y 'tu_basedatos' por tus datos reales.
    'dsn' => 'mongodb://localhost:27017/servicio',
    // Puedes incluir configuraciones adicionales si es necesario, por ejemplo:
    // 'options' => [
    //     'connectTimeoutMS' => 3000,
    // ],
];
