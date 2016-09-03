<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $curso_id
 * @property string $nombre
 * @property integer $area_id
 * @property string $created
 * @property string $updated
 * @property integer $createby
 * @property integer $updateby
 * @property string $active
 *
 * @property Area $area
 * @property CursoGrado[] $cursoGrados
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso_id', 'area_id'], 'required'],
            [['curso_id', 'area_id', 'createby', 'updateby'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['nombre'], 'string', 'max' => 45],
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
            'curso_id' => 'Curso ID',
            'nombre' => 'Nombre',
            'area_id' => 'Area ID',
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
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['area_id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoGrados()
    {
        return $this->hasMany(CursoGrado::className(), ['curso_id' => 'curso_id']);
    }
}
