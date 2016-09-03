<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promedio_competencia".
 *
 * @property double $promedio_competencia
 * @property integer $competencia_id
 * @property integer $bimestre_id
 * @property integer $codigo_matricula
 * @property integer $curso_docente_grado_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Nota[] $notas
 * @property Evaluacion[] $evaluacions
 * @property Competencia $competencia
 * @property PromedioBimestral $bimestre
 */
class PromedioCompetencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promedio_competencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promedio_competencia'], 'number'],
            [['competencia_id', 'bimestre_id', 'codigo_matricula', 'curso_docente_grado_id'], 'required'],
            [['competencia_id', 'bimestre_id', 'codigo_matricula', 'curso_docente_grado_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['competencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Competencia::className(), 'targetAttribute' => ['competencia_id' => 'competencia_id']],
            [['bimestre_id', 'codigo_matricula', 'curso_docente_grado_id'], 'exist', 'skipOnError' => true, 'targetClass' => PromedioBimestral::className(), 'targetAttribute' => ['bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'promedio_competencia' => 'Promedio Competencia',
            'competencia_id' => 'Competencia ID',
            'bimestre_id' => 'Bimestre ID',
            'codigo_matricula' => 'Codigo Matricula',
            'curso_docente_grado_id' => 'Curso Docente Grado ID',
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
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['competencia_id' => 'competencia_id', 'bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado' => 'curso_docente_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['evaluacion_id' => 'evaluacion_id'])->viaTable('nota', ['competencia_id' => 'competencia_id', 'bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado' => 'curso_docente_grado_id']);
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
    public function getBimestre()
    {
        return $this->hasOne(PromedioBimestral::className(), ['bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id']);
    }
}
