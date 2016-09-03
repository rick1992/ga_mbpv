<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_competencia".
 *
 * @property integer $peso
 * @property string $formula
 * @property integer $anio_id
 * @property integer $area_id
 * @property integer $competencia_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Competencia $competencia
 * @property FormulaArea $anio
 * @property CompetenciaEvaluacion[] $competenciaEvaluacions
 * @property Evaluacion[] $evaluacions
 */
class AreaCompetencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area_competencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peso', 'anio_id', 'area_id', 'competencia_id', 'createby', 'updateby'], 'integer'],
            [['anio_id', 'area_id', 'competencia_id'], 'required'],
            [['created', 'updated'], 'safe'],
            [['formula'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['competencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Competencia::className(), 'targetAttribute' => ['competencia_id' => 'competencia_id']],
            [['anio_id', 'area_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormulaArea::className(), 'targetAttribute' => ['anio_id' => 'anio_id', 'area_id' => 'area_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'peso' => 'Peso',
            'formula' => 'Formula',
            'anio_id' => 'Anio ID',
            'area_id' => 'Area ID',
            'competencia_id' => 'Competencia ID',
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
    public function getCompetencia()
    {
        return $this->hasOne(Competencia::className(), ['competencia_id' => 'competencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnio()
    {
        return $this->hasOne(FormulaArea::className(), ['anio_id' => 'anio_id', 'area_id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetenciaEvaluacions()
    {
        return $this->hasMany(CompetenciaEvaluacion::className(), ['anio_id' => 'anio_id', 'area_id' => 'area_id', 'competencia_id' => 'competencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['evaluacion_id' => 'evaluacion_id'])->viaTable('competencia_evaluacion', ['anio_id' => 'anio_id', 'area_id' => 'area_id', 'competencia_id' => 'competencia_id']);
    }
}
