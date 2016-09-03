<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dia".
 *
 * @property integer $dia_id
 * @property string $descripcion
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Horario[] $horarios
 */
class Dia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dia_id'], 'required'],
            [['dia_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['descripcion'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dia_id' => 'Dia ID',
            'descripcion' => 'Descripcion',
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
        return $this->hasMany(Horario::className(), ['dia_id' => 'dia_id']);
    }
}
