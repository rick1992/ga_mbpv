<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bimestre".
 *
 * @property integer $bimestre_id
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property integer $anio_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property AnioAcademico $anio
 */
class Bimestre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bimestre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bimestre_id', 'anio_id'], 'required'],
            [['bimestre_id', 'anio_id', 'createby', 'updateby'], 'integer'],
            [['fecha_inicio', 'fecha_final', 'created', 'updated'], 'safe'],
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
            'bimestre_id' => 'Bimestre ID',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
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
