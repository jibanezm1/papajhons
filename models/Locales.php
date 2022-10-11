<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locales".
 *
 * @property int $id
 * @property string $name
 * @property string $text_address
 * @property string $latitude
 * @property string $longitude
 * @property string $phone
 * @property string $commune
 * @property string $region
 */
class Locales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'text_address', 'latitude', 'longitude', 'phone', 'commune', 'region'], 'required'],
            [['id'], 'integer'],
            [['name', 'text_address', 'latitude', 'longitude', 'phone', 'commune', 'region'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text_address' => 'Dirección',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'phone' => 'Telefono',
            'commune' => 'Comuna',
            'region' => 'Región',
        ];
    }
}
