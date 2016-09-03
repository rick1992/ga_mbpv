<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota".
 *
 * @property double $nota
 * @property integer $evaluacion_id
 * @property integer $competencia_id
 * @property integer $bimestre_id
 * @property integer $codigo_matricula
 * @property integer $curso_docente_grado
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Evaluacion $evaluacion
 * @property PromedioCompetencia $competencia
 */
class Nota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota'], 'number'],
            [['evaluacion_id', 'competencia_id', 'bimestre_id', 'codigo_matricula', 'curso_docente_grado'], 'required'],
            [['evaluacion_id', 'competencia_id', 'bimestre_id', 'codigo_matricula', 'curso_docente_grado', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['evaluacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evaluacion::className(), 'targetAttribute' => ['evaluacion_id' => 'evaluacion_id']],
            [['competencia_id', 'bimestre_id', 'codigo_matricula', 'curso_docente_grado'], 'exist', 'skipOnError' => true, 'targetClass' => PromedioCompetencia::className(), 'targetAttribute' => ['competencia_id' => 'competencia_id', 'bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado' => 'curso_docente_grado_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nota' => 'Nota',
            'evaluacion_id' => 'Evaluacion ID',
            'competencia_id' => 'Competencia ID',
            'bimestre_id' => 'Bimestre ID',
            'codigo_matricula' => 'Codigo Matricula',
            'curso_docente_grado' => 'Curso Docente Grado',
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
    public function getEvaluacion()
    {
        return $this->hasOne(Evaluacion::className(), ['evaluacion_id' => 'evaluacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencia()
    {
        return $this->hasOne(PromedioCompetencia::className(), ['competencia_id' => 'competencia_id', 'bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado']);
    }
}
