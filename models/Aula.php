<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property integer $aula_id
 * @property string $descripcion
 * @property integer $capacidad
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Horario[] $horarios
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aula_id'], 'required'],
            [['aula_id', 'capacidad', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['descripcion'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'aula_id' => 'Aula ID',
            'descripcion' => 'Descripcion',
            'capacidad' => 'Capacidad',
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
        return $this->hasMany(Horario::className(), ['aula_id' => 'aula_id']);
    }
}
