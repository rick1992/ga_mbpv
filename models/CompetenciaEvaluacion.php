<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competencia_evaluacion".
 *
 * @property integer $peso
 * @property integer $evaluacion_id
 * @property integer $anio_id
 * @property integer $area_id
 * @property integer $competencia_id
 * @property string $muestra
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property AreaCompetencia $anio
 * @property Evaluacion $evaluacion
 */
class CompetenciaEvaluacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competencia_evaluacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peso', 'evaluacion_id', 'anio_id', 'area_id', 'competencia_id', 'createby', 'updateby'], 'integer'],
            [['evaluacion_id', 'anio_id', 'area_id', 'competencia_id'], 'required'],
            [['created', 'updated'], 'safe'],
            [['muestra', 'active'], 'string', 'max' => 1],
            [['anio_id', 'area_id', 'competencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => AreaCompetencia::className(), 'targetAttribute' => ['anio_id' => 'anio_id', 'area_id' => 'area_id', 'competencia_id' => 'competencia_id']],
            [['evaluacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evaluacion::className(), 'targetAttribute' => ['evaluacion_id' => 'evaluacion_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'peso' => 'Peso',
            'evaluacion_id' => 'Evaluacion ID',
            'anio_id' => 'Anio ID',
            'area_id' => 'Area ID',
            'competencia_id' => 'Competencia ID',
            'muestra' => 'Muestra',
            'created' => 'Created',
            'updated' => 'Updated',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnio()
    {
        return $this->hasOne(AreaCompetencia::className(), ['anio_id' => 'anio_id', 'area_id' => 'area_id', 'competencia_id' => 'competencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacion()
    {
        return $this->hasOne(Evaluacion::className(), ['evaluacion_id' => 'evaluacion_id']);
    }
}
