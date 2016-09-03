<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property integer $turno_id
 * @property string $turno
 * @property string $hora_inicio
 * @property string $hora_final
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property AnioAcademico[] $anioAcademicos
 * @property FechaEstudioAnio[] $fechaEstudioAnios
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hora_inicio', 'hora_final', 'created', 'updated'], 'safe'],
            [['createby', 'updateby'], 'integer'],
            [['turno'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'turno_id' => 'Turno ID',
            'turno' => 'Turno',
            'hora_inicio' => 'Hora Inicio',
            'hora_final' => 'Hora Final',
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
    public function getAnioAcademicos()
    {
        return $this->hasMany(AnioAcademico::className(), ['turno_id' => 'turno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFechaEstudioAnios()
    {
        return $this->hasMany(FechaEstudioAnio::className(), ['turno_id' => 'turno_id']);
    }
}
