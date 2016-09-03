<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anio_academico".
 *
 * @property integer $anio_id
 * @property string $nombre_anio
 * @property integer $anio
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 * @property integer $turno_id
 *
 * @property Turno $turno
 * @property Bimestre[] $bimestres
 * @property CalendarioAcademico[] $calendarioAcademicos
 * @property ProgramacionEscolar[] $programacionEscolars
 * @property ProgramacionSemana[] $programacionSemanas
 */
class AnioAcademico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anio_academico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anio', 'createby', 'updateby', 'turno_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['turno_id'], 'required'],
            [['nombre_anio'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
            [['turno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_id' => 'turno_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'anio_id' => 'Anio ID',
            'nombre_anio' => 'Nombre Anio',
            'anio' => 'Anio',
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
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['turno_id' => 'turno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBimestres()
    {
        return $this->hasMany(Bimestre::className(), ['anio_id' => 'anio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarioAcademicos()
    {
        return $this->hasMany(CalendarioAcademico::className(), ['anio_id' => 'anio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionEscolars()
    {
        return $this->hasMany(ProgramacionEscolar::className(), ['anio_id' => 'anio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionSemanas()
    {
        return $this->hasMany(ProgramacionSemana::className(), ['anio_id' => 'anio_id']);
    }
}
