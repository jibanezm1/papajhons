<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_systems".
 *
 * @property int $id
 * @property string $nombreUsuario
 * @property string $correoUsuario
 * @property string $claveUsuario
 * @property int $idTipo
 */
class UsersSystems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_systems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombreUsuario', 'correoUsuario', 'claveUsuario', 'idTipo'], 'required'],
            [['nombreUsuario', 'correoUsuario', 'claveUsuario'], 'string'],
            [['idTipo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombreUsuario' => 'Nombre Usuario',
            'correoUsuario' => 'Correo Usuario',
            'claveUsuario' => 'Clave Usuario',
            'idTipo' => 'Tipo Usuario',
        ];
    }
    public function getTipo()
    {
        return $this->hasOne(TipoUsuario::className(), ['idTipo' => 'idTipo']);
    }
}
