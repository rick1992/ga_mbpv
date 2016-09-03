<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programacion_escolar".
 *
 * @property integer $filial_id
 * @property integer $anio_id
 * @property integer $numero_secciones
 * @property integer $grado_id
 * @property integer $nivel_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property CursoGrado[] $cursoGrados
 * @property MatriculaAlumno[] $matriculaAlumnos
 * @property Filial $filial
 * @property AnioAcademico $anio
 * @property GradoNivel $grado
 */
class ProgramacionEscolar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programacion_escolar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filial_id', 'anio_id', 'numero_secciones', 'grado_id', 'nivel_id'], 'required'],
            [['filial_id', 'anio_id', 'numero_secciones', 'grado_id', 'nivel_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
            [['filial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filial::className(), 'targetAttribute' => ['filial_id' => 'idfilial']],
            [['anio_id'], 'exist', 'skipOnError' => true, 'targetClass' => AnioAcademico::className(), 'targetAttribute' => ['anio_id' => 'anio_id']],
            [['grado_id', 'nivel_id'], 'exist', 'skipOnError' => true, 'targetClass' => GradoNivel::className(), 'targetAttribute' => ['grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filial_id' => 'Filial ID',
            'anio_id' => 'Anio ID',
            'numero_secciones' => 'Numero Secciones',
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
    public function getCursoGrados()
    {
        return $this->hasMany(CursoGrado::className(), ['filial_id' => 'filial_id', 'anio_id' => 'anio_id', 'grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaAlumnos()
    {
        return $this->hasMany(MatriculaAlumno::className(), ['filial_id' => 'filial_id', 'anio_id' => 'anio_id', 'grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(Filial::className(), ['idfilial' => 'filial_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnio()
    {
        return $this->hasOne(AnioAcademico::className(), ['anio_id' => 'anio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrado()
    {
        return $this->hasOne(GradoNivel::className(), ['grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']);
    }
}
