<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoUsuario".
 *
 * @property int $idTipo
 * @property string $tipo
 */
class TipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoUsuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipo' => 'Id Tipo',
            'tipo' => 'Tipo',
        ];
    }
}
