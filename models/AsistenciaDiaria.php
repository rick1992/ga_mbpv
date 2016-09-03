<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asistencia_diaria".
 *
 * @property string $asistencia
 * @property string $justificacion
 * @property integer $asistencia_diaria_id
 * @property integer $codigo_matricula
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property FechaEstudioAnio $asistenciaDiaria
 * @property MatriculaAlumno $codigoMatricula
 */
class AsistenciaDiaria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asistencia_diaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asistencia_diaria_id', 'codigo_matricula'], 'required'],
            [['asistencia_diaria_id', 'codigo_matricula', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['asistencia', 'active'], 'string', 'max' => 1],
            [['justificacion'], 'string', 'max' => 250],
            [['asistencia_diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => FechaEstudioAnio::className(), 'targetAttribute' => ['asistencia_diaria_id' => 'fecha_estudio_anio_id']],
            [['codigo_matricula'], 'exist', 'skipOnError' => true, 'targetClass' => MatriculaAlumno::className(), 'targetAttribute' => ['codigo_matricula' => 'codigo_matricula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'asistencia' => 'Asistencia',
            'justificacion' => 'Justificacion',
            'asistencia_diaria_id' => 'Asistencia Diaria ID',
            'codigo_matricula' => 'Codigo Matricula',
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
    public function getAsistenciaDiaria()
    {
        return $this->hasOne(FechaEstudioAnio::className(), ['fecha_estudio_anio_id' => 'asistencia_diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoMatricula()
    {
        return $this->hasOne(MatriculaAlumno::className(), ['codigo_matricula' => 'codigo_matricula']);
    }
}
