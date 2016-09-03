<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promedio_bimestral".
 *
 * @property double $promedio_bimestral
 * @property integer $bimestre_id
 * @property integer $codigo_matricula
 * @property integer $curso_docente_grado_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property CursoAlumno $codigoMatricula
 * @property PromedioCompetencia[] $promedioCompetencias
 * @property Competencia[] $competencias
 */
class PromedioBimestral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promedio_bimestral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promedio_bimestral'], 'number'],
            [['bimestre_id', 'codigo_matricula', 'curso_docente_grado_id'], 'required'],
            [['bimestre_id', 'codigo_matricula', 'curso_docente_grado_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['codigo_matricula', 'curso_docente_grado_id'], 'exist', 'skipOnError' => true, 'targetClass' => CursoAlumno::className(), 'targetAttribute' => ['codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'promedio_bimestral' => 'Promedio Bimestral',
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
    public function getCodigoMatricula()
    {
        return $this->hasOne(CursoAlumno::className(), ['codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromedioCompetencias()
    {
        return $this->hasMany(PromedioCompetencia::className(), ['bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencias()
    {
        return $this->hasMany(Competencia::className(), ['competencia_id' => 'competencia_id'])->viaTable('promedio_competencia', ['bimestre_id' => 'bimestre_id', 'codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id']);
    }
}
