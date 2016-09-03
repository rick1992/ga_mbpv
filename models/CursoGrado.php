<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso_grado".
 *
 * @property integer $curso_grado_id
 * @property integer $horas
 * @property integer $curso_id
 * @property integer $filial_id
 * @property integer $anio_id
 * @property integer $grado_id
 * @property integer $nivel_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property CursoDocenteGrado[] $cursoDocenteGrados
 * @property Curso $curso
 * @property ProgramacionEscolar $filial
 */
class CursoGrado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso_grado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso_grado_id', 'curso_id', 'filial_id', 'anio_id', 'grado_id', 'nivel_id'], 'required'],
            [['curso_grado_id', 'horas', 'curso_id', 'filial_id', 'anio_id', 'grado_id', 'nivel_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'curso_id']],
            [['filial_id', 'anio_id', 'grado_id', 'nivel_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramacionEscolar::className(), 'targetAttribute' => ['filial_id' => 'filial_id', 'anio_id' => 'anio_id', 'grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'curso_grado_id' => 'Curso Grado ID',
            'horas' => 'Horas',
            'curso_id' => 'Curso ID',
            'filial_id' => 'Filial ID',
            'anio_id' => 'Anio ID',
            'grado_id' => 'Grado ID',
            'nivel_id' => 'Nivel ID',
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
    public function getCursoDocenteGrados()
    {
        return $this->hasMany(CursoDocenteGrado::className(), ['curso_grado_id' => 'curso_grado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['curso_id' => 'curso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(ProgramacionEscolar::className(), ['filial_id' => 'filial_id', 'anio_id' => 'anio_id', 'grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']);
    }
}
