<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "efectividad_academica".
 *
 * @property integer $codigoMatricula
 * @property integer $idbimestre
 * @property integer $sumatoria
 * @property string $promedio
 * @property string $comportamiento
 * @property integer $puesto
 */
class EfectividadAcademica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'efectividad_academica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigoMatricula', 'idbimestre'], 'required'],
            [['codigoMatricula', 'idbimestre', 'sumatoria', 'puesto'], 'integer'],
            [['promedio'], 'number'],
            [['comportamiento'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigoMatricula' => 'Codigo Matricula',
            'idbimestre' => 'Idbimestre',
            'sumatoria' => 'Sumatoria',
            'promedio' => 'Promedio',
            'comportamiento' => 'Comportamiento',
            'puesto' => 'Puesto',
        ];
    }
}
