<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matricula_alumno".
 *
 * @property integer $alumno_id
 * @property string $estado_matricula
 * @property double $nota_promocional
 * @property integer $seccion_id
 * @property integer $codigo_matricula
 * @property string $fecha_matricula
 * @property string $comprobante_matricula
 * @property string $tipo_matricula
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
 * @property AsistenciaCurso[] $asistenciaCursos
 * @property AsistenciaDiaria[] $asistenciaDiarias
 * @property FechaEstudioAnio[] $asistenciaDiarias0
 * @property CursoAlumno[] $cursoAlumnos
 * @property CursoDocenteGrado[] $cursoDocenteGrados
 * @property DetalleMatricula[] $detalleMatriculas
 * @property Alumno $alumno
 * @property Seccion $seccion
 * @property ProgramacionEscolar $filial
 */
class MatriculaAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matricula_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'seccion_id', 'codigo_matricula', 'fecha_matricula', 'comprobante_matricula', 'filial_id', 'anio_id', 'grado_id', 'nivel_id'], 'required'],
            [['alumno_id', 'seccion_id', 'codigo_matricula', 'filial_id', 'anio_id', 'grado_id', 'nivel_id', 'createby', 'updateby'], 'integer'],
            [['nota_promocional'], 'number'],
            [['fecha_matricula', 'created', 'updated'], 'safe'],
            [['estado_matricula', 'comprobante_matricula', 'tipo_matricula'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_id' => 'alumno_id']],
            [['seccion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['seccion_id' => 'seccion_id']],
            [['filial_id', 'anio_id', 'grado_id', 'nivel_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramacionEscolar::className(), 'targetAttribute' => ['filial_id' => 'filial_id', 'anio_id' => 'anio_id', 'grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alumno_id' => 'Alumno ID',
            'estado_matricula' => 'Estado Matricula',
            'nota_promocional' => 'Nota Promocional',
            'seccion_id' => 'Seccion ID',
            'codigo_matricula' => 'Codigo Matricula',
            'fecha_matricula' => 'Fecha Matricula',
            'comprobante_matricula' => 'Comprobante Matricula',
            'tipo_matricula' => 'Tipo Matricula',
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
    public function getAsistenciaCursos()
    {
        return $this->hasMany(AsistenciaCurso::className(), ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistenciaDiarias()
    {
        return $this->hasMany(AsistenciaDiaria::className(), ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistenciaDiarias0()
    {
        return $this->hasMany(FechaEstudioAnio::className(), ['fecha_estudio_anio_id' => 'asistencia_diaria_id'])->viaTable('asistencia_diaria', ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoAlumnos()
    {
        return $this->hasMany(CursoAlumno::className(), ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDocenteGrados()
    {
        return $this->hasMany(CursoDocenteGrado::className(), ['curso_docente_grado_id' => 'curso_docente_grado_id'])->viaTable('curso_alumno', ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleMatriculas()
    {
        return $this->hasMany(DetalleMatricula::className(), ['codigo_matricula' => 'codigo_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['alumno_id' => 'alumno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccion()
    {
        return $this->hasOne(Seccion::className(), ['seccion_id' => 'seccion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilial()
    {
        return $this->hasOne(ProgramacionEscolar::className(), ['filial_id' => 'filial_id', 'anio_id' => 'anio_id', 'grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']);
    }
}
