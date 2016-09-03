<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grado_nivel".
 *
 * @property integer $grado_id
 * @property string $descripcion
 * @property integer $nivel_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Nivel $nivel
 * @property ProgramacionEscolar[] $programacionEscolars
 */
class GradoNivel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grado_nivel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nivel_id'], 'required'],
            [['nivel_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['descripcion'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['nivel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nivel::className(), 'targetAttribute' => ['nivel_id' => 'nivel_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grado_id' => 'Grado ID',
            'descripcion' => 'Descripcion',
            'nivel_id' => 'Nivel ID',
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
    public function getNivel()
    {
        return $this->hasOne(Nivel::className(), ['nivel_id' => 'nivel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionEscolars()
    {
        return $this->hasMany(ProgramacionEscolar::className(), ['grado_id' => 'grado_id', 'nivel_id' => 'nivel_id']);
    }
}
