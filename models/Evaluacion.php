<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluacion".
 *
 * @property integer $evaluacion_id
 * @property string $descripcion
 * @property string $evaluacion_min
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property CompetenciaEvaluacion[] $competenciaEvaluacions
 * @property AreaCompetencia[] $anios
 * @property Nota[] $notas
 * @property PromedioCompetencia[] $competencias
 */
class Evaluacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evaluacion_id'], 'required'],
            [['evaluacion_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['descripcion'], 'string', 'max' => 45],
            [['evaluacion_min'], 'string', 'max' => 5],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'evaluacion_id' => 'Evaluacion ID',
            'descripcion' => 'Descripcion',
            'evaluacion_min' => 'Evaluacion Min',
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
    public function getCompetenciaEvaluacions()
    {
        return $this->hasMany(CompetenciaEvaluacion::className(), ['evaluacion_id' => 'evaluacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnios()
    {
        return $this->hasMany(AreaCompetencia::className(), ['anio_id' => 'anio_id', 'area_id' => 'area_id', 'competencia_id' => 'competencia_id'])->viaTable('competencia_evaluacion', ['evaluacion_id' => 'evaluacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['evaluacion_id' => 'evaluacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencias()
    {
        return $this->hasMany(PromedioCompetencia::className(), ['competencia_id' => 'competencia_id', 'bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado'])->viaTable('nota', ['evaluacion_id' => 'evaluacion_id']);
    }
}
