<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $cliente
 * @property string $direccion
 * @property string $comuna
 * @property string $region
 * @property string $telefono
 * @property string $correo
 * @property string|null $lat
 * @property string|null $lng
 * @property int $idLocal
 * @property int $km
 * @property string $tiempo
 * @property int|null $sugerido
 * @property string|null $sugeridoKm
 * @property string|null $sugeridoTiempo
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente', 'direccion', 'comuna', 'region', 'telefono', 'correo', 'idLocal', 'km', 'tiempo'], 'required'],
            [['idLocal', 'km', 'sugerido'], 'integer'],
            [['tiempo', 'sugeridoKm', 'sugeridoTiempo'], 'string'],
            [['cliente', 'direccion', 'comuna', 'region', 'lat', 'lng'], 'string', 'max' => 200],
            [['telefono'], 'string', 'max' => 30],
            [['correo'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente' => 'Cliente',
            'direccion' => 'Direccion',
            'comuna' => 'Comuna',
            'region' => 'Region',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'idLocal' => 'Id Local',
            'km' => 'Km',
            'tiempo' => 'Tiempo',
            'sugerido' => 'Sugerido',
            'sugeridoKm' => 'Sugerido Km',
            'sugeridoTiempo' => 'Sugerido Tiempo',
        ];
    }
    public function getLocal()
    {
        return $this->hasOne(Locales::className(), ['id' => 'idLocal']);
    }
}
