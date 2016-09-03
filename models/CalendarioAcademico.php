<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendario_academico".
 *
 * @property string $fecha
 * @property string $descripcion
 * @property integer $anio_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property AnioAcademico $anio
 */
class CalendarioAcademico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendario_academico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'anio_id'], 'required'],
            [['fecha', 'created', 'updated'], 'safe'],
            [['anio_id', 'createby', 'updateby'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['anio_id'], 'exist', 'skipOnError' => true, 'targetClass' => AnioAcademico::className(), 'targetAttribute' => ['anio_id' => 'anio_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'anio_id' => 'Anio ID',
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
    public function getAnio()
    {
        return $this->hasOne(AnioAcademico::className(), ['anio_id' => 'anio_id']);
    }
}
