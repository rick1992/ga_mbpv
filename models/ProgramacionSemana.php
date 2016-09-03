<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programacion_semana".
 *
 * @property integer $semana_id
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
class ProgramacionSemana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programacion_semana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semana_id', 'anio_id'], 'required'],
            [['semana_id', 'anio_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
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
            'semana_id' => 'Semana ID',
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
