<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formula_area".
 *
 * @property integer $anio_id
 * @property integer $area_id
 * @property string $formula
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property AreaCompetencia[] $areaCompetencias
 * @property Competencia[] $competencias
 * @property Area $area
 */
class FormulaArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formula_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anio_id', 'area_id'], 'required'],
            [['anio_id', 'area_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['formula'], 'string', 'max' => 45],
            [['active'], 'string', 'max' => 1],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'area_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'anio_id' => 'Anio ID',
            'area_id' => 'Area ID',
            'formula' => 'Formula',
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
    public function getAreaCompetencias()
    {
        return $this->hasMany(AreaCompetencia::className(), ['anio_id' => 'anio_id', 'area_id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencias()
    {
        return $this->hasMany(Competencia::className(), ['competencia_id' => 'competencia_id'])->viaTable('area_competencia', ['anio_id' => 'anio_id', 'area_id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['area_id' => 'area_id']);
    }
}
