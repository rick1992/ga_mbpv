<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivel".
 *
 * @property integer $nivel_id
 * @property string $descripcion
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property GradoNivel[] $gradoNivels
 */
class Nivel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['createby', 'updateby'], 'integer'],
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
            'nivel_id' => 'Nivel ID',
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
    public function getGradoNivels()
    {
        return $this->hasMany(GradoNivel::className(), ['nivel_id' => 'nivel_id']);
    }
}
