<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fecha_estudio_anio".
 *
 * @property integer $fecha_estudio_anio_id
 * @property string $estado
 * @property string $motivo
 * @property string $fecha
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 * @property integer $turno_id
 *
 * @property AsistenciaDiaria[] $asistenciaDiarias
 * @property MatriculaAlumno[] $codigoMatriculas
 * @property Turno $turno
 */
class FechaEstudioAnio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fecha_estudio_anio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'created', 'updated'], 'safe'],
            [['createby', 'updateby', 'turno_id'], 'integer'],
            [['turno_id'], 'required'],
            [['estado', 'active'], 'string', 'max' => 1],
            [['motivo'], 'string', 'max' => 250],
            [['turno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_id' => 'turno_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fecha_estudio_anio_id' => 'Fecha Estudio Anio ID',
            'estado' => 'Estado',
            'motivo' => 'Motivo',
            'fecha' => 'Fecha',
            'created' => 'Created',
            'updated' => 'Updated',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
            'turno_id' => 'Turno ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistenciaDiarias()
    {
        return $this->hasMany(AsistenciaDiaria::className(), ['asistencia_diaria_id' => 'fecha_estudio_anio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoMatriculas()
    {
        return $this->hasMany(MatriculaAlumno::className(), ['codigo_matricula' => 'codigo_matricula'])->viaTable('asistencia_diaria', ['asistencia_diaria_id' => 'fecha_estudio_anio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['turno_id' => 'turno_id']);
    }
}
