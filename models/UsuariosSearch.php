<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cliente', 'direccion', 'comuna', 'region', 'telefono', 'correo', 'lat', 'lng', 'km', 'tiempo', 'idLocal'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuarios::find();

        // add conditions that should always apply here
        $query->joinWith('local');
        // $query->orderBy(["km" => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'cliente', $this->cliente])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'usuarios.comuna', $this->comuna])
            ->andFilterWhere(['like', 'usuarios.region', $this->region])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'km', $this->km])
            ->andFilterWhere(['like', 'tiempo', $this->tiempo])
            ->andFilterWhere(['like', 'locales.name', $this->idLocal])
            ->andFilterWhere(['like', 'lng', $this->lng]);

        return $dataProvider;
    }
}
