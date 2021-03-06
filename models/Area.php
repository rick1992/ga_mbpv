<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $area_id
 * @property string $descripcion
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Curso[] $cursos
 * @property FormulaArea[] $formulaAreas
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area_id'], 'required'],
            [['area_id', 'createby', 'updateby'], 'integer'],
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
            'area_id' => 'Area ID',
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
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['area_id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulaAreas()
    {
        return $this->hasMany(FormulaArea::className(), ['area_id' => 'area_id']);
    }
}
