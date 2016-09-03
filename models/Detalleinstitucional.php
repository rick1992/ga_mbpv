<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleinstitucional".
 *
 * @property integer $idDI
 * @property integer $idFilial
 * @property string $nivel
 * @property string $grado
 * @property integer $idAnio
 * @property integer $numerosecciones
 */
class Detalleinstitucional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalleinstitucional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFilial', 'idAnio', 'numerosecciones'], 'integer'],
            [['nivel', 'grado'], 'string', 'max' => 45],
            [['idFilial', 'nivel', 'grado', 'idAnio'], 'unique', 'targetAttribute' => ['idFilial', 'nivel', 'grado', 'idAnio'], 'message' => 'The combination of Id Filial, Nivel, Grado and Id Anio has already been taken.'],
            [['idFilial', 'nivel', 'grado', 'idAnio'], 'unique', 'targetAttribute' => ['idFilial', 'nivel', 'grado', 'idAnio'], 'message' => 'The combination of Id Filial, Nivel, Grado and Id Anio has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDI' => 'Id Di',
            'idFilial' => 'Id Filial',
            'nivel' => 'Nivel',
            'grado' => 'Grado',
            'idAnio' => 'Id Anio',
            'numerosecciones' => 'Numerosecciones',
        ];
    }
}
