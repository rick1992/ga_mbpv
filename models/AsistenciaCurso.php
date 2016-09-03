<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asistencia_curso".
 *
 * @property integer $asistencia_curso_id
 * @property string $alumno_id
 * @property string $asistencia
 * @property integer $codigo_matricula
 * @property string $fecha
 * @property integer $horario_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property MatriculaAlumno $codigoMatricula
 * @property Horario $horario
 */
class AsistenciaCurso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asistencia_curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asistencia_curso_id', 'codigo_matricula', 'horario_id'], 'required'],
            [['asistencia_curso_id', 'codigo_matricula', 'horario_id', 'createby', 'updateby'], 'integer'],
            [['fecha', 'created', 'updated'], 'safe'],
            [['alumno_id', 'asistencia'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['codigo_matricula'], 'exist', 'skipOnError' => true, 'targetClass' => MatriculaAlumno::className(), 'targetAttribute' => ['codigo_matricula' => 'codigo_matricula']],
            [['horario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horario::className(), 'targetAttribute' => ['horario_id' => 'horario_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'asistencia_curso_id' => 'Asistencia Curso ID',
            'alumno_id' => 'Alumno ID',
            'asistencia' => 'Asistencia',
            'codigo_matricula' => 'Codigo Matricula',
            'fecha' => 'Fecha',
            'horario_id' => 'Horario ID',
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
        return $this->hasOne(MatriculaAlumno::className(), ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario()
    {
        return $this->hasOne(Horario::className(), ['horario_Id' => 'horario_id']);
    }
}
