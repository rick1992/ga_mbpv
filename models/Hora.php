<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hora".
 *
 * @property integer $hora_id
 * @property string $hora_inicio
 * @property string $hora_final
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Horario[] $horarios
 */
class Hora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hora_id'], 'required'],
            [['hora_id', 'createby', 'updateby'], 'integer'],
            [['hora_inicio', 'hora_final', 'created', 'updated'], 'safe'],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hora_id' => 'Hora ID',
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
    public function getHorarios()
    {
        return $this->hasMany(Horario::className(), ['hora_id' => 'hora_id']);
    }
}
