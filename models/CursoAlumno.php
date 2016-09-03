<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso_alumno".
 *
 * @property double $nota_curso
 * @property integer $codigo_matricula
 * @property integer $curso_docente_grado_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property CursoDocenteGrado $cursoDocenteGrado
 * @property MatriculaAlumno $codigoMatricula
 * @property PromedioBimestral[] $promedioBimestrals
 */
class CursoAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota_curso'], 'number'],
            [['codigo_matricula', 'curso_docente_grado_id'], 'required'],
            [['codigo_matricula', 'curso_docente_grado_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['curso_docente_grado_id'], 'exist', 'skipOnError' => true, 'targetClass' => CursoDocenteGrado::className(), 'targetAttribute' => ['curso_docente_grado_id' => 'curso_docente_grado_id']],
            [['codigo_matricula'], 'exist', 'skipOnError' => true, 'targetClass' => MatriculaAlumno::className(), 'targetAttribute' => ['codigo_matricula' => 'codigo_matricula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nota_curso' => 'Nota Curso',
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
    public function getCursoDocenteGrado()
    {
        return $this->hasOne(CursoDocenteGrado::className(), ['curso_docente_grado_id' => 'curso_docente_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoMatricula()
    {
        return $this->hasOne(MatriculaAlumno::className(), ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromedioBimestrals()
    {
        return $this->hasMany(PromedioBimestral::className(), ['codigo_matricula' => 'codigo_matricula', 'curso_docente_grado_id' => 'curso_docente_grado_id']);
    }
}
