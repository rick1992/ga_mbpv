<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property integer $horario_Id
 * @property integer $aula_id
 * @property integer $hora_id
 * @property integer $dia_id
 * @property integer $curso_docente_grado_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property AsistenciaCurso[] $asistenciaCursos
 * @property Aula $aula
 * @property CursoDocenteGrado $cursoDocenteGrado
 * @property Dia $dia
 * @property Hora $hora
 */
class Horario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['horario_Id', 'aula_id', 'hora_id', 'dia_id', 'curso_docente_grado_id'], 'required'],
            [['horario_Id', 'aula_id', 'hora_id', 'dia_id', 'curso_docente_grado_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['aula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['aula_id' => 'aula_id']],
            [['curso_docente_grado_id'], 'exist', 'skipOnError' => true, 'targetClass' => CursoDocenteGrado::className(), 'targetAttribute' => ['curso_docente_grado_id' => 'curso_docente_grado_id']],
            [['dia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dia::className(), 'targetAttribute' => ['dia_id' => 'dia_id']],
            [['hora_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hora::className(), 'targetAttribute' => ['hora_id' => 'hora_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'horario_Id' => 'Horario  ID',
            'aula_id' => 'Aula ID',
            'hora_id' => 'Hora ID',
            'dia_id' => 'Dia ID',
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
    public function getAsistenciaCursos()
    {
        return $this->hasMany(AsistenciaCurso::className(), ['horario_id' => 'horario_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aula::className(), ['aula_id' => 'aula_id']);
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
    public function getDia()
    {
        return $this->hasOne(Dia::className(), ['dia_id' => 'dia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHora()
    {
        return $this->hasOne(Hora::className(), ['hora_id' => 'hora_id']);
    }
}
