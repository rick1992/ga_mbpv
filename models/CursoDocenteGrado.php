<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso_docente_grado".
 *
 * @property integer $curso_docente_grado_id
 * @property integer $seccion_id
 * @property integer $curso_grado_id
 * @property integer $docente_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property CursoAlumno[] $cursoAlumnos
 * @property MatriculaAlumno[] $codigoMatriculas
 * @property CursoGrado $cursoGrado
 * @property Docente $docente
 * @property Horario[] $horarios
 */
class CursoDocenteGrado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso_docente_grado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso_docente_grado_id', 'seccion_id', 'curso_grado_id'], 'required'],
            [['curso_docente_grado_id', 'seccion_id', 'curso_grado_id', 'docente_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['curso_grado_id'], 'exist', 'skipOnError' => true, 'targetClass' => CursoGrado::className(), 'targetAttribute' => ['curso_grado_id' => 'curso_grado_id']],
            [['docente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['docente_id' => 'docente_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'curso_docente_grado_id' => 'Curso Docente Grado ID',
            'seccion_id' => 'Seccion ID',
            'curso_grado_id' => 'Curso Grado ID',
            'docente_id' => 'Docente ID',
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
    public function getCursoAlumnos()
    {
        return $this->hasMany(CursoAlumno::className(), ['curso_docente_grado_id' => 'curso_docente_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoMatriculas()
    {
        return $this->hasMany(MatriculaAlumno::className(), ['codigo_matricula' => 'codigo_matricula'])->viaTable('curso_alumno', ['curso_docente_grado_id' => 'curso_docente_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoGrado()
    {
        return $this->hasOne(CursoGrado::className(), ['curso_grado_id' => 'curso_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['docente_id' => 'docente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horario::className(), ['curso_docente_grado_id' => 'curso_docente_grado_id']);
    }
}
